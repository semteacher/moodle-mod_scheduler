<?php

/**
 * Controller for all teacher-related views.
 *
 * @package    mod
 * @subpackage scheduler
 * @copyright  2011 Henning Bostelmann and others (see README.txt)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


function scheduler_action_doaddsession($scheduler, $formdata) {

    global $DB, $OUTPUT;

    $data = (object) $formdata;

    $fordays = (($data->rangeend - $data->rangestart) / DAYSECS);

    // Create as many slots of $duration as will fit between $starttime and $endtime and that do not conflict.
    $countslots = 0;
    $couldnotcreateslots = '';
    $startfrom = $data->rangestart+($data->starthour*60+$data->startminute)*60;
    $endat = $data->rangestart+($data->endhour*60+$data->endminute)*60;
    $slot = new stdClass();
    $slot->schedulerid = $scheduler->id;
    $slot->teacherid = $data->teacherid;
    $slot->appointmentlocation = $data->appointmentlocation;
    $slot->reuse = $data->reuse;
    $slot->exclusivity = $data->exclusivity;
    $slot->duration = $data->duration;
    $slot->notes = '';
    $slot->notesformat = FORMAT_HTML;
    $slot->timemodified = time();

    for ($d = 0; $d <= $fordays; $d ++) {
        $starttime = $startfrom + ($d * DAYSECS);
        $eventdate = usergetdate($starttime);
        $dayofweek = $eventdate['wday'];
        if ((($dayofweek == 1) && ($data->monday == 1)) ||
                        (($dayofweek == 2) && ($data->tuesday == 1)) ||
                        (($dayofweek == 3) && ($data->wednesday == 1)) ||
                        (($dayofweek == 4) && ($data->thursday == 1)) ||
                        (($dayofweek == 5) && ($data->friday == 1)) ||
                        (($dayofweek == 6) && ($data->saturday == 1)) ||
                        (($dayofweek == 0) && ($data->sunday == 1))) {
            $slot->starttime = make_timestamp($eventdate['year'], $eventdate['mon'], $eventdate['mday'], $data->starthour, $data->startminute);
            $data->timestart = $slot->starttime;
            $data->timeend = make_timestamp($eventdate['year'], $eventdate['mon'], $eventdate['mday'], $data->endhour, $data->endminute);

            // this corrects around midnight bug
            if ($data->timestart > $data->timeend) {
                $data->timeend += DAYSECS;
            }
            if ($data->hideuntilrel == 0) {
                $slot->hideuntil = time();
            } else {
                $slot->hideuntil = make_timestamp($eventdate['year'], $eventdate['mon'], $eventdate['mday'], 6, 0) - $data->hideuntilrel;
            }
            if ($data->emaildaterel == -1) {
                $slot->emaildate = 0;
            } else {
                $slot->emaildate = make_timestamp($eventdate['year'], $eventdate['mon'], $eventdate['mday'], 0, 0) - $data->emaildaterel;
            }
            while ($slot->starttime <= $data->timeend - $data->duration * 60) {
                //TDMU exclusivity check-out
                if ($scheduler->allowmulticourseappointment) {
                    $exclusive_condition = true;
                }
                else {
                    $exclusive_condition = false;
                }          
                $conflictsRemote = scheduler_get_conflicts($scheduler->id, $data->timestart, $data->timestart + $data->duration * 60, $data->teacherid, 0, SCHEDULER_OTHERS, $exclusive_condition);
                $conflictsLocal = scheduler_get_conflicts($scheduler->id, $data->timestart, $data->timestart + $data->duration * 60, $data->teacherid, 0, SCHEDULER_SELF, false);
                if (!$conflictsRemote) $conflictsRemote = array();
                if (!$conflictsLocal) $conflictsLocal = array();
                $conflicts = $conflictsRemote + $conflictsLocal;
                //$conflicts = scheduler_get_conflicts($scheduler->id, $data->timestart, $data->timestart + $data->duration * 60, $data->teacherid, 0, SCHEDULER_ALL, false);//origin
                                
                if ($conflicts) {
                    if (!$data->forcewhenoverlap) {
                        print_string('conflictingslots', 'scheduler');
                        echo '<ul>';
                        foreach ($conflicts as $aconflict) {
                            $conflictinfo = scheduler_get_courseinfobyslotid($aconflict->id);//TDMU
                            $msg = userdate($conflictinfo->starttime) . ' ' . usertime($conflictinfo->starttime) . ' ' . get_string('incourse', 'scheduler') . ': ';
                            $msg .= $conflictinfo->shortname . ' - ' . $conflictinfo->fullname;
                            echo html_writer::tag('li', $msg);
                        }
                        echo '</ul><br/>';
                    } else { // we force, so delete all conflicting before inserting
                        foreach ($conflicts as $conflict) {
                            scheduler_delete_slot($conflict->id);
                        }
                    }
                } else {
                    $DB->insert_record('scheduler_slots', $slot, false, true);
                    $countslots++;
                }
                $slot->starttime += ($data->duration + $data->break) * 60;
                $data->timestart += ($data->duration + $data->break) * 60;
            }
        }
    }
    echo $OUTPUT->heading(get_string('slotsadded', 'scheduler', $countslots));
}


// We first have to check whether some action needs to be performed
switch ($action) {

/************************************ Saving a aperiod session with slots ********************************/
    case 'doaddaperiodsession':{
        // This creates aperiod sessions using the data submitted by the user via the form on add.html
        get_aperiod_session_data($scheduler->defaultslotduration, $data);
		
        $errors = array();

        if ($data->teacherid == 0){
            unset($erroritem);
            $erroritem->message = get_string('noteacherforslot', 'scheduler');
            $erroritem->on = 'teacherid';
            $errors[] = $erroritem;
        }

        /// first slot is in the past
        if ($data->rangestart < time() - DAYSECS) {
            unset($erroritem);
            $erroritem->message = get_string('startpast', 'scheduler');
            $erroritem->on = 'rangestart';
            $errors[] = $erroritem;
        }

        // first error trap. Ask to correct that first
        if (count($errors)){
            $action = 'addaperiodsession';
            break;
        }
        
        /// make a base slot for generating
        $slot = new stdClass();
        $slot->appointmentlocation = $data->appointmentlocation;
        $slot->exclusivity = $data->exclusivity;
        $slot->reuse = $data->reuse;
        $slot->duration = $data->duration;
        $slot->schedulerid = $scheduler->id;
        $slot->timemodified = time();
        $slot->teacherid = $data->teacherid;

        /// check if overlaps.
        $startfrom = $data->rangestart;		
        $noslotsallowed = true;
		for ($d = 0; $d <= count($data->listdates)-1; $d ++){
                $noslotsallowed = false;
				$data->starttime = strtotime($data->listdates[$d]);
				if ($scheduler->allowmulticourseappointment) {
			        $conflictsRemote = scheduler_get_conflicts($scheduler->id, $data->starttime, $data->starttime + $data->duration * 60, $data->teacherid, 0, SCHEDULER_OTHERS, true);	
                }
                else {
                    $conflictsRemote = scheduler_get_conflicts($scheduler->id, $data->starttime, $data->starttime + $data->duration * 60, $data->teacherid, 0, SCHEDULER_OTHERS, false);			
                }
                $conflictsLocal = scheduler_get_conflicts($scheduler->id, $data->starttime, $data->starttime + $data->duration * 60, $data->teacherid, 0, SCHEDULER_SELF, false);
                if (!$conflictsRemote) $conflictsRemote = array();
                if (!$conflictsLocal) $conflictsLocal = array();
                $conflicts = $conflictsRemote + $conflictsLocal;				
                if (!$data->forcewhenoverlap){
                    if ($conflicts){
                        unset($erroritem);
                        $erroritem->message = get_string('overlappings', 'scheduler');
                        $erroritem->on = 'range';
                        $errors[] = $erroritem;
                        
                        print_string('conflictingslots', 'scheduler');
                        echo '<ul>';
                        foreach ($conflicts as $aConflict){
                            $conflictinfo = scheduler_get_courseinfobyslotid($aConflict->id);
                            echo '<li> ' . scheduler_userdate($conflictinfo->starttime, 1) . ' ' . scheduler_usertime($conflictinfo->starttime, 1) . ' ' . get_string('incourse', 'scheduler') . ': ' . $conflictinfo->shortname . ' - ' . $conflictinfo->fullname . "</li>\n";
                        }
                        echo '</ul><br/>';
                    }
                }
        }
		
        /// Finally check if some slots are allowed (an error is thrown to ask care to this situation)
        if ($noslotsallowed){
            unset($erroritem);
            $erroritem->message = get_string('allslotsincloseddays', 'scheduler');
            $erroritem->on = 'days';
            $errors[] = $erroritem;
        }

        // second error trap. For last error cases.
        if (count($errors)){
            $action = 'addaperiodsession';
            break;
        }

        /// Now create as many slots of $duration as will fit between $starttime and $endtime and that do not conflicts
        $countslots = 0;
        $couldnotcreateslots = '';
        $startfrom = $data->timestart;
		for ($d = 0; $d <= count($data->listdates)-1; $d ++){
				$year = date("Y", strtotime($data->listdates[$d]));
				$month = date("m", strtotime($data->listdates[$d]));
				$day = date("d", strtotime($data->listdates[$d]));
				$slot->starttime = make_timestamp($year, $month, $day, $data->starthour, $data->startminute);
				$eventdate = usergetdate($slot->starttime);
                $data->timestart = $slot->starttime;
                $data->timeend = make_timestamp(date('Y',$data->timestart), date('m',$data->timestart), date('d',$data->timestart), $data->endhour, $data->endminute);

                // this corrects around midnight bug
                if ($data->timestart > $data->timeend){
                    $data->timeend += DAYSECS;
                }
                if ($data->displayfrom == 'now'){
                    $slot->hideuntil = time();
                } 
                else {
                    $slot->hideuntil = make_timestamp($eventdate['year'], $eventdate['mon'], $eventdate['mday'], 6, 0) - $data->displayfrom;
                }
                if ($data->emailfrom == 'never'){
                    $slot->emaildate = 0;
                } 
                else {
                    $slot->emaildate = make_timestamp($eventdate['year'], $eventdate['mon'], $eventdate['mday'], 0, 0) - $data->emailfrom;
                }
                while ($slot->starttime <= $data->timeend - $data->duration * 60) {
				    if ($scheduler->allowmulticourseappointment) {
			            $conflictsRemote = scheduler_get_conflicts($scheduler->id, $data->timestart, $data->timestart + $data->duration * 60, $data->teacherid, 0, SCHEDULER_OTHERS, true);	
                    }
                    else {
                        $conflictsRemote = scheduler_get_conflicts($scheduler->id, $data->timestart, $data->timestart + $data->duration * 60, $data->teacherid, 0, SCHEDULER_OTHERS, false);			
                    }
                    $conflictsLocal = scheduler_get_conflicts($scheduler->id, $data->timestart, $data->timestart + $data->duration * 60, $data->teacherid, 0, SCHEDULER_SELF, false);
                    if (!$conflictsRemote) $conflictsRemote = array();
                    if (!$conflictsLocal) $conflictsLocal = array();
                    $conflicts = $conflictsRemote + $conflictsLocal;                    
                    if ($conflicts) {
                        if (!$data->forcewhenoverlap){
                            print_string('conflictingslots', 'scheduler');
                            echo '<ul>';
                            foreach ($conflicts as $aConflict){
                                $conflictinfo = scheduler_get_courseinfobyslotid($aConflict->id);
                                echo '<li> ' . scheduler_userdate($conflictinfo->starttime, 1) . ' ' . scheduler_usertime($conflictinfo->starttime, 1) . ' ' . get_string('incourse', 'scheduler') . ': ' . $conflictinfo->shortname . ' - ' . $conflictinfo->fullname . "</li>\n";
                            }
                            echo '</ul><br/>';
                        }
                        else{ // we force, so delete all conflicting before inserting
                            foreach($conflicts as $conflict){
                                scheduler_delete_slot($conflict->id);
                            }
                        }
                    } 
                    else {
                        $DB->insert_record('scheduler_slots', $slot, false);
                        $countslots++;
                    }
                    $slot->starttime += $data->duration * 60;
                    $data->timestart += $data->duration * 60;
                }
   //         }
        }
        echo $OUTPUT->heading(get_string('slotsadded', 'scheduler', $countslots));
        break;
    }
    /************************************ Deleting a slot ***********************************************/
    case 'deleteslot': {
        $slotid = required_param('slotid', PARAM_INT);

        scheduler_delete_slot($slotid, $scheduler);
        break;
    }
    /************************************ Deleting multiple slots ***********************************************/
    case 'deleteslots': {
        $slotids = required_param('items', PARAM_RAW);
        $slots = explode(",", $slotids);
        foreach ($slots as $aSlotId) {
            scheduler_delete_slot($aSlotId, $scheduler);
        }
        break;
    }
    /************************************ Students were seen ***************************************************/
    case 'saveseen':{
        // get required param
        $slotid = required_param('slotid', PARAM_INT);
        $seen = optional_param_array('seen', array(), PARAM_INT);

        $appointments = scheduler_get_appointments($slotid);
        if (is_array($seen)) {
            foreach ($appointments as $anAppointment) {
                $anAppointment->attended = (in_array($anAppointment->id, $seen)) ? 1 : 0 ;
                $anAppointment->timemodified = time();
                $anAppointment->appointmentnote = $anAppointment->appointmentnote;
                $DB->update_record('scheduler_appointment', $anAppointment);
            }
        }

        $slot = $DB->get_record('scheduler_slots', array('id'=>$slotid));
        scheduler_events_update($slot, $course);
        break;
    }
    /************************************ Revoking all appointments to a slot ***************************************/
    case 'revokeall': {
        $slotid = required_param('slotid', PARAM_INT);

        if ($slot = $DB->get_record('scheduler_slots', array('id' => $slotid))) {
            // unassign student to the slot
            $oldstudents = $DB->get_records('scheduler_appointment', array('slotid' => $slot->id), '', 'id,studentid');
            $appointmentdelta = 0 - count($oldstudents);//must be less then 0!//TDMU???

            if ($oldstudents) {
                foreach ($oldstudents as $oldstudent) {
                    scheduler_delete_appointment($oldstudent->id, $slot, $scheduler);
                }
            }

            //increase capability of the all other overlapped slots of this teacher
            scheduler_autoupdate_student_count($appointmentdelta, $slot, $scheduler, $CFG->scheduler_maxstudentsperslot);//@TDMU

            // delete subsequent event
            scheduler_delete_calendar_events($slot);

            // notify student
            if ($scheduler->allownotifications && $oldstudents) {
                foreach ($oldstudents as $oldstudent) {
                    include_once($CFG->dirroot.'/mod/scheduler/mailtemplatelib.php');

                    $student = $DB->get_record('user', array('id'=>$oldstudent->studentid));
                    $teacher = $DB->get_record('user', array('id'=>$slot->teacherid));

                    $vars = scheduler_get_mail_variables($scheduler, $slot, $teacher, $student);
                    scheduler_send_email_from_template($student, $teacher, $COURSE, 'cancelledbyteacher', 'teachercancelled', $vars, 'scheduler');
                }
            }

            if (!$slot->reuse and $slot->starttime > time() - $scheduler->reuseguardtime) {
                $DB->delete_records('scheduler_slots', array('id'=>$slot->id));
            }
        }
        break;
    }

    /************************************ Toggling to unlimited group ***************************************/
    case 'allowgroup':{
        $slotid = required_param('slotid', PARAM_INT);
        $slot = new stdClass();
        $slot->id = $slotid;
        $slot->exclusivity = 0;
        $DB->update_record('scheduler_slots', $slot);
        break;
    }

    /************************************ Toggling to single student ******************************************/
    case 'forbidgroup':{
        $slotid = required_param('slotid', PARAM_INT);
        $slot = new stdClass();
        $slot->id = $slotid;
        $slot->exclusivity = 1;
        $DB->update_record('scheduler_slots', $slot);
        break;
    }

    /************************************ Toggling reuse on ***************************************/
    case 'reuse':{
        $slotid = required_param('slotid', PARAM_INT);
        $slot = new stdClass();
        $slot->id = $slotid;
        $slot->reuse = 1;
        $DB->update_record('scheduler_slots', $slot);
        break;
    }

    /************************************ Toggling reuse off ***************************************/
    case 'unreuse':{
        $slotid = required_param('slotid', PARAM_INT);
        $slot = new stdClass();
        $slot->id = $slotid;
        $slot->reuse = 0;
        $DB->update_record('scheduler_slots', $slot);
        break;
    }

    /************************************ Deleting all slots ***************************************************/
    case 'deleteall':{
        if ($slots = $DB->get_records('scheduler_slots', array('schedulerid' => $cm->instance))) {
            foreach ($slots as $aSlot) {
                scheduler_delete_calendar_events($aSlot);
            }
            list($usql, $params) = $DB->get_in_or_equal(array_keys($slots));
            $DB->delete_records_select('scheduler_appointment', " slotid $usql ", $params);
            $DB->delete_records('scheduler_slots', array('schedulerid' => $cm->instance));
            unset($slots);
            scheduler_update_grades($scheduler);
        }
        break;
    }
    /************************************ Deleting unused slots *************************************************/
    // MUST STAY HERE, JUST BEFORE deleteallunused
    case 'deleteunused':{
        $teacherClause = " AND s.teacherid = {$USER->id} ";
    }
    /************************************ Deleting unused slots (all teachers) ************************************/
    case 'deleteallunused': {
        if (!isset($teacherClause)) $teacherClause = '';
        if (has_capability('mod/scheduler:manageallappointments', $context)) {
            $sql = "
            SELECT
            s.id,
            s.id
            FROM
            {scheduler_slots} s
            LEFT JOIN
            {scheduler_appointment} a
            ON
            s.id = a.slotid
            WHERE
            s.schedulerid = ? AND a.studentid IS NULL
            {$teacherClause}
            ";
            if ($unappointed = $DB->get_records_sql($sql, array($scheduler->id))) {
                list($usql, $params) = $DB->get_in_or_equal(array_keys($unappointed));
                $DB->delete_records_select('scheduler_slots', "schedulerid = $cm->instance AND id $usql ", $params);
            }
        }
        break;
    }
    /************************************ Deleting current teacher's slots ***************************************/
    case 'deleteonlymine': {
        if ($slots = $DB->get_records_select('scheduler_slots', "schedulerid = {$cm->instance} AND teacherid = {$USER->id}", null, '', 'id,id')) {
            foreach ($slots as $aSlot) {
                scheduler_delete_calendar_events($aSlot);
            }
            $DB->delete_records('scheduler_slots', array('schedulerid'=>$cm->instance, 'teacherid'=>$USER->id));
            $slotList = implode(',', array_keys($slots));
            $DB->delete_records_select('scheduler_appointment', "slotid IN ($slotList)");
            unset($slots);
            scheduler_update_grades($scheduler);
        }
        break;
    }
    /************************************ Mark as seen now *******************************************************/
    case 'markasseennow': {
        $slot = new stdClass();
        $slot->schedulerid = $scheduler->id;
        $slot->teacherid = $USER->id;
        $slot->starttime = time();
        $slot->duration = $scheduler->defaultslotduration;
        $slot->exclusivity = 1;
        $slot->reuse = 0;
        $slot->notes = '';
        $slot->notesformat = FORMAT_HTML;
        $slot->hideuntil = time();
        $slot->appointmentlocation = '';
        $slot->emaildate = 0;
        $slot->timemodified = time();                                
        $slotid = $DB->insert_record('scheduler_slots', $slot);
        
        $appointment = new stdClass();
        $appointment->slotid = $slotid;
        $appointment->studentid = required_param('studentid', PARAM_INT);
        $appointment->attended = 1;
        $appointment->appointmentnote = '';
        $appointment->appointmentnoteformat = FORMAT_HTML;
        $appointment->timecreated = time();
        $appointment->timemodified = time();
        $DB->insert_record('scheduler_appointment', $appointment);
        
        break;
    }
}

/*************************************************************************************************************/
?>