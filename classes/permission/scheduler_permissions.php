<?php

/**
 * Controller for scheduler module.
 *
 * @package    mod_scheduler
 * @copyright  2019 Henning Bostelmann and others (see README.txt)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_scheduler\permission;

defined('MOODLE_INTERNAL') || die();

/**
 * The base class for controllers.
 *
 * @copyright  2019 Henning Bostelmann and others (see README.txt)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class scheduler_permissions extends permissions_manager {

    public function __construct(\context $context, $userid) {
        parent::__construct('mod_scheduler', $context, $userid);
    }

    public function teacher_can_see_slot(\mod_scheduler\model\slot $slot) {
        if ($this->has_any_capability(['manageallappointments', 'canseeotherteachersbooking'])) {
            return true;
        } else if ($this->has_any_capability(['manage', 'attend'])) {
            return $this->userid == $slot->teacherid;
        } else {
            return false;
        }
    }

    public function can_edit_slot(\mod_scheduler\model\slot $slot) {
        if ($this->has_capability('manageallappointments')) {
            return true;
        } else if ($this->has_capability('manage')) {
            return $this->userid == $slot->teacherid;
        } else {
            return false;
        }
    }

    public function can_edit_own_slots() {
        return $this->has_any_capability(['manage', 'manageallappointments']);
    }

    public function can_edit_all_slots() {
        return $this->has_capability('manageallappointments');
    }

    public function can_see_all_slots() {
        return $this->has_any_capability(['manageallappointments', 'canseeotherteachersbooking']);
    }

    public function can_see_appointment(\mod_scheduler\model\appointment $app) {
        if ($this->has_any_capability(['manageallappointments', 'canseeotherteachersbooking'])) {
            return true;
        } else if ($this->has_capability('attend') && $this->userid == $app->get_slot()->teacherid) {
            return true;
        } else if ($this->has_capability('appoint') && $this->userid == $app->studentid) {
            return true;
        } else {
            return false;
        }
    }

    public function can_edit_grade(\mod_scheduler\model\appointment $app) {
        if ($this->has_capability('manageallappointments')) {
            return true;
        } else if (get_config('mod_scheduler', 'allteachersgrading')) {
            return true;
        } else {
            return $this->userid == $app->get_slot()->teacherid;
        }
    }

    public function can_edit_attended(\mod_scheduler\model\appointment $app) {
        if ($this->has_capability('manageallappointments')) {
            return true;
        } else {
            return $this->userid == $app->get_slot()->teacherid;
        }
    }

    public function can_edit_notes(\mod_scheduler\model\appointment $app) {
        if ($this->has_capability('manageallappointments')) {
            return true;
        } else {
            return $this->userid == $app->get_slot()->teacherid;
        }
    }

}
