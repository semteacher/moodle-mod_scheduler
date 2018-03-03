<?php

/**
 * Controller for student view
 *
 * @package    mod_scheduler
 * @copyright  2015 Henning Bostelmann and others (see README.txt)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/mod/scheduler/mailtemplatelib.php');

function scheduler_book_slot($scheduler, $slotid, $userid, $groupid, $mform, $formdata, $returnurl) {

    global $DB, $COURSE, $output;

    $slot = $scheduler->get_slot($slotid);
    if (!$slot) {
        throw new moodle_exception('error');
    }

    if (!$slot->is_in_bookable_period()) {
        throw new moodle_exception('nopermissions');
    }

    $requiredcapacity = 1;
    $userstobook = array($userid);
    if ($groupid > 0) {
        if (!$scheduler->is_group_scheduling_enabled()) {
            throw new moodle_exception('error');
        }
        $groupmembers = $scheduler->get_available_students($groupid);
        $requiredcapacity = count($groupmembers);
        $userstobook = array_keys($groupmembers);
    } else if ($groupid == 0) {
        if (!$scheduler->is_individual_scheduling_enabled()) {
            throw new moodle_exception('error');
        }
    } else {
        // Group scheduling enabled but no group selected.
        throw new moodle_exception('error');
    }

    $errormessage = '';

    $bookinglimit = $scheduler->count_bookable_appointments($userid, false);
    if ($bookinglimit == 0) {
        $errormessage = get_string('selectedtoomany', 'scheduler', $bookinglimit);
    } else {
        // Validate our user ids.
        $existingstudents = array();
        foreach ($slot->get_appointments() as $app) {
            $existingstudents[] = $app->studentid;
        }
        $userstobook = array_diff($userstobook, $existingstudents);

        $remaining = $slot->count_remaining_appointments();
        // If the slot is already overcrowded...
        if ($remaining >= 0 && $remaining < $requiredcapacity) {
            if ($requiredcapacity > 1) {
                $errormessage = get_string('notenoughplaces', 'scheduler');
            } else {
                $errormessage = get_string('slot_is_just_in_use', 'scheduler');
            }
        }
    }
	//check against ALL conflicts
	//TODO: need global module setting to control student's booking overlaps
	unset($conflicts);
    $conflicts = $scheduler->get_conflicts($slot->starttime, $slot->starttime + $slot->duration * 60,
                                                       0, $userid, SCHEDULER_ALL);
	if ($conflicts){
		//$errormessage = get_string('studentowerlapprohibied', 'scheduler');
		$errormessage = 'You can not book this because you have already booked an another appointment for same time!';
		$errormessage.= html_writer::start_tag('ul');
		foreach ($conflicts as $conflict){
			$confcourseurl = new moodle_url('/course/view.php', array('id'=>$conflict->courseid));
			$confscheduler = \scheduler_instance::load_by_id($conflict->schedulerid);
			$confschedcmurl = new moodle_url('/mod/scheduler/view.php', array('id'=>$confscheduler->get_cmid()));
			$confinfo = html_writer::link($confschedcmurl, userdate($conflict->starttime) . ' ');
			$confinfo.= get_string('incourse', 'scheduler') . ': ';
			$confinfo.= html_writer::link($confcourseurl, $conflict->coursefullname);
			$errormessage.= html_writer::tag('li',$confinfo);
		}
		$errormessage.= html_writer::end_tag('ul');
		//$cl = new scheduler_conflict_list();
        //$cl->add_conflicts($conflicts);
	}
	
    if ($errormessage) {
        echo $output->header();
        echo $output->box($errormessage, 'error');
		
        //TODO: update with links
		//echo $output->render($cl);
        
		echo $output->continue_button($returnurl);
        echo $output->footer();
        exit();
    }

    // Create new appointment for each member of the group.
    foreach ($userstobook as $studentid) {
        $appointment = $slot->create_appointment();
        $appointment->studentid = $studentid;
        $appointment->attended = 0;
        $appointment->timecreated = time();
        $appointment->timemodified = time();
        $appointment->save();

        if (($studentid == $userid) && $mform) {
            $mform->save_booking_data($formdata, $appointment);
        }

        \mod_scheduler\event\booking_added::create_from_slot($slot)->trigger();

        // Notify the teacher.
        if ($scheduler->allownotifications) {
            $student = $DB->get_record('user', array('id' => $appointment->studentid), '*', MUST_EXIST);
            $teacher = $DB->get_record('user', array('id' => $slot->teacherid), '*', MUST_EXIST);
            scheduler_messenger::send_slot_notification($slot, 'bookingnotification', 'applied',
                    $student, $teacher, $teacher, $student, $COURSE);
        }
    }
    $slot->save();
	//decrease capability of the all other overlapped slots of this teacher
    scheduler_autoupdate_student_count(count($userstobook), $slot, $scheduler, get_config('mod_scheduler', 'defmaxstudentsperslot')); //@TDMU
    redirect($returnurl);

}

$returnurlparas =  array('id' => $cm->id);
if ($scheduler->is_group_scheduling_enabled()) {
    $returnurlparas['appointgroup'] = $appointgroup;
}
$returnurl = new moodle_url('/mod/scheduler/view.php', $returnurlparas);


/******************************************** Show the booking form *******************************************/

if ($action == 'bookingform') {
    require_once($CFG->dirroot.'/mod/scheduler/bookingform.php');

    require_sesskey();
    require_capability('mod/scheduler:appoint', $context);

    $slotid = required_param('slotid', PARAM_INT);
    $slot = $scheduler->get_slot($slotid);

    $actionurl = new moodle_url($returnurl, array('what' => 'bookingform', 'slotid' => $slotid));

    $mform = new scheduler_booking_form($slot, $actionurl);

    if ($mform->is_cancelled()) {
        redirect($returnurl);
    } else if (($formdata = $mform->get_data()) || $appointgroup < 0) {
        // Workaround - call scheduler_book_slot also if no group was selected, to show an error message.
        scheduler_book_slot($scheduler, $slotid, $USER->id, $appointgroup, $mform, $formdata, $returnurl);
        redirect($returnurl);
    } else {
        $groupinfo = null;
        if ($scheduler->is_group_scheduling_enabled() && $appointgroup == 0) {
            $groupinfo = get_string('myself', 'scheduler');
        } else if ($appointgroup > 0) {
            $groupinfo = $mygroupsforscheduling[$appointgroup]->name;
        }

        echo $output->header();
        echo $output->heading(get_string('bookaslot', 'scheduler'));
        echo $output->box(format_text($scheduler->intro, $scheduler->introformat));

        $info = scheduler_appointment_info::make_from_slot($slot, true, true, $groupinfo);
        echo $output->render($info);
        $mform->display();
        echo $output->footer();
        exit();
    }

}

/************************************************ Book a slot  ************************************************/

if ($action == 'bookslot') {

    require_sesskey();
    require_capability('mod/scheduler:appoint', $context);

    // Reject this request if the user is required to go through a booking form.
    if ($scheduler->uses_bookingform()) {
        throw new moodle_exception('error');
    }

    // Get the request parameters.
    $slotid = required_param('slotid', PARAM_INT);

    scheduler_book_slot($scheduler, $slotid, $USER->id, $appointgroup, null, null, $returnurl);
}

/******************************************** Show details of booking *******************************************/

if ($action == 'viewbooking') {
    require_once($CFG->dirroot.'/mod/scheduler/bookingform.php');

    require_sesskey();
    require_capability('mod/scheduler:appoint', $context);

    $appointmentid = required_param('appointmentid', PARAM_INT);
    list($slot, $appointment) = $scheduler->get_slot_appointment($appointmentid);

    if ($appointment->studentid != $USER->id) {
        throw new moodle_exception('nopermissions');
    }

    echo $output->header();
    echo $output->heading(get_string('bookingdetails', 'scheduler'));
    echo $output->box(format_text($scheduler->intro, $scheduler->introformat));
    $info = scheduler_appointment_info::make_from_appointment($slot, $appointment);
    echo $output->render($info);

    echo $output->continue_button($returnurl);
    echo $output->footer();
    exit();

}

/******************************************** Edit a booking *******************************************/

if ($action == 'editbooking') {
    require_once($CFG->dirroot.'/mod/scheduler/bookingform.php');

    require_sesskey();
    require_capability('mod/scheduler:appoint', $context);

    if (!$scheduler->uses_studentdata()) {
        throw new moodle_exception('error');
    }

    $appointmentid = required_param('appointmentid', PARAM_INT);
    list($slot, $appointment) = $scheduler->get_slot_appointment($appointmentid);

    if ($appointment->studentid != $USER->id) {
        throw new moodle_exception('nopermissions');
    }
    if (!$slot->is_in_bookable_period()) {
        throw new moodle_exception('nopermissions');
    }

    $actionurl = new moodle_url($returnurl, array('what' => 'editbooking', 'appointmentid' => $appointmentid));

    $mform = new scheduler_booking_form($slot, $actionurl, true);
    $mform->set_data($mform->prepare_booking_data($appointment));

    if ($mform->is_cancelled()) {
        redirect($returnurl);
    } else if ($formdata = $mform->get_data()) {
        $mform->save_booking_data($formdata, $appointment);
        redirect($returnurl);
    } else {
        echo $output->header();
        echo $output->heading(get_string('editbooking', 'scheduler'));
        echo $output->box(format_text($scheduler->intro, $scheduler->introformat));
        $info = scheduler_appointment_info::make_from_slot($slot);
        echo $output->render($info);
        $mform->display();
        echo $output->footer();
        exit();
    }

}


/******************************** Cancel a booking (for the current student or a group) ******************************/

if ($action == 'cancelbooking') {

    require_sesskey();
    require_capability('mod/scheduler:appoint', $context);

    // Get the request parameters.
    $slotid = required_param('slotid', PARAM_INT);
    $slot = $scheduler->get_slot($slotid);
    if (!$slot) {
        throw new moodle_exception('error');
    }

    if (!$slot->is_in_bookable_period()) {
        throw new moodle_exception('nopermissions');
    }

    $userstocancel = array($USER->id);
    if ($appointgroup) {
        $userstocancel = array_keys($scheduler->get_available_students($appointgroup));
    }

    foreach ($userstocancel as $userid) {
        if ($appointment = $slot->get_student_appointment($userid)) {
            $scheduler->delete_appointment($appointment->id);

            // Notify the teacher.
            if ($scheduler->allownotifications) {
                $student = $DB->get_record('user', array('id' => $USER->id));
                $teacher = $DB->get_record('user', array('id' => $slot->teacherid));
                scheduler_messenger::send_slot_notification($slot, 'bookingnotification', 'cancelled',
                                                            $student, $teacher, $teacher, $student, $COURSE);
            }
            \mod_scheduler\event\booking_removed::create_from_slot($slot)->trigger();
        }
    }
	//increase capability of the all other overlapped slots of this teacher
    scheduler_autoupdate_student_count(0-count($userstocancel), $slot, $scheduler, get_config('mod_scheduler', 'defmaxstudentsperslot')); //@TDMU
    redirect($returnurl);

}
