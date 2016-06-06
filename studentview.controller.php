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

$returnurl = new moodle_url('/mod/scheduler/view.php', array('id' => $cm->id));

/************************************************ Book a slot  ************************************************/

if ($action == 'bookslot') {

    require_sesskey();

    // Get the request parameters.
    $slotid = required_param('slotid', PARAM_INT);
    $slot = $scheduler->get_slot($slotid);
    if (!$slot) {
        throw new moodle_exception('error');
    }

    if (!$slot->is_in_bookable_period()) {
        throw new moodle_exception('nopermissions');
    }

    $requiredcapacity = 1;
    $userstobook = array($USER->id);
    if ($appointgroup) {
        $groupmembers = $scheduler->get_available_students($appointgroup);
        $requiredcapacity = count($groupmembers);
        $userstobook = array_keys($groupmembers);
    }

    $errormessage = '';

    $bookinglimit = $scheduler->count_bookable_appointments($USER->id, false);
    if ($bookinglimit == 0) {
        $errormessage = get_string('selectedtoomany', 'scheduler', $bookinglimit);
    }
    if (!$errormessage) {
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

    if ($errormessage) {
        echo $output->header();
        echo $output->box($errormessage, 'error');
        echo $output->continue_button($returnurl);
        echo $output->footer();
        exit();
    }

    // Create new appointment and add it for each member of the group.
    foreach ($userstobook as $studentid) {
        $appointment = $slot->create_appointment();
        $appointment->studentid = $studentid;
        $appointment->attended = 0;
        $appointment->timecreated = time();
        $appointment->timemodified = time();

        \mod_scheduler\event\booking_added::create_from_slot($slot)->trigger();

        // Notify the teacher.
        if ($scheduler->allownotifications) {
            $student = $DB->get_record('user', array('id' => $appointment->studentid));
            $teacher = $DB->get_record('user', array('id' => $slot->teacherid));
            scheduler_messenger::send_slot_notification($slot, 'bookingnotification', 'applied',
                                                        $student, $teacher, $teacher, $student, $course);
        }
    }
    $slot->save();
    redirect($returnurl);
}


/******************************** Cancel a booking (for the current student or a group) ******************************/

if ($action == 'cancelbooking') {

    require_sesskey();

    // Get the request parameters.
    $slotid = required_param('slotid', PARAM_INT);
    $slot = $scheduler->get_slot($slotid);
    if (!$slot) {
        throw new moodle_exception('error');
    }

    if (!$slot->is_in_bookable_period()) {
        throw new moodle_exception('nopermissions');
                // Delete the appointment (and possibly the slot).
                $scheduler->delete_appointment($oldappid);

                // Notify the teacher.
                if ($scheduler->allownotifications) {
                    scheduler_send_email_from_template($teacher, $student, $course, 'cancelledbystudent', 'cancelled', $vars, 'scheduler');
                }
            }
            //increase capability of the all other overlapped slots of this teacher
            scheduler_autoupdate_student_count(-1, $oldappointment, $scheduler, $CFG->scheduler_maxstudentsperslot);//@TDMU
        }
    }

    require_capability('mod/scheduler:appoint', $context);

    $userstocancel = array($USER->id);
    if ($appointgroup) {
        $userstocancel = array_keys($scheduler->get_available_students($appointgroup));
        //decrease capability of the all other overlapped slots of this teacher
        scheduler_autoupdate_student_count(1, $slot, $scheduler, $CFG->scheduler_maxstudentsperslot); //@TDMU
    }

    
//TODO new code/// need refactoring
//foreach ($userstocancel as $userid) {
//        if ($appointment = $slot->get_student_appointment($userid)) {
//            $scheduler->delete_appointment($appointment->id);

            // Notify the teacher.
//            if ($scheduler->allownotifications) {
//end new
// *********************************** Disengage from the slot (only the current student) ******************************/
if ($action == 'disengage') {
    require_sesskey();
    require_capability('mod/scheduler:disengage', $context);
    $where = 'studentid = :studentid AND attended = 0 AND ' .
        'EXISTS(SELECT 1 FROM {scheduler_slots} sl WHERE sl.id = slotid AND sl.schedulerid = :scheduler AND sl.starttime > :cutoff)';
    $params = array('scheduler' => $scheduler->id, 'studentid' => $USER->id, 'cutoff' => time() + $scheduler->guardtime);
    $appointments = $DB->get_records_select('scheduler_appointment', $where, $params);
//TODO: below - new version. need a code refactoring - @TDMU
//    if ($appointments) {
//        foreach ($appointments as $appointment) {
//
//            $oldslot = $scheduler->get_slot($appointment->slotid);
//
//            \mod_scheduler\event\booking_removed::create_from_slot($oldslot)->trigger();
//
//            $scheduler->delete_appointment($appointment->id);

//            // Notify the teacher.
//            if ($scheduler->allownotifications) {
    if ($appointments){
        foreach($appointments as $appointment){
            $oldslot = $DB->get_record('scheduler_slots', array('id' => $appointment->slotid));
            scheduler_delete_appointment($appointment->id, $oldslot, $scheduler);
            
            //increase capability of the all other overlapped slots of this teacher
            scheduler_autoupdate_student_count(-1, $oldslot, $scheduler, $CFG->scheduler_maxstudentsperslot);//@TDMU
            
            // notify teacher
            if ($scheduler->allownotifications){
                $student = $DB->get_record('user', array('id' => $USER->id));
                $teacher = $DB->get_record('user', array('id' => $slot->teacherid));
                scheduler_messenger::send_slot_notification($slot, 'bookingnotification', 'cancelled',
                                                            $student, $teacher, $teacher, $student, $COURSE);
            }
            \mod_scheduler\event\booking_removed::create_from_slot($slot)->trigger();
        }
    }
    redirect($returnurl);

}
