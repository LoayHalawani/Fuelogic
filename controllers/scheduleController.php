<?php

class ScheduleController {
    private $scheduleModel;

    public function __construct($db) {
        $this->scheduleModel = new ScheduleModel($db);
    }

    public function createSchedule(
        $employee_id, $schedule_date, $start_time, $end_time
    ) {
        if ($this->scheduleModel->create(
            $employee_id, $schedule_date, $start_time, $end_time
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getScheduleByID($schedule_id) {
        $schedule = $this->scheduleModel->getById($schedule_id);
        if ($schedule) {
            return true;
        } else {
            return false;
        }
    }

    public function updateSchedule(
        $employee_id, $schedule_date, $start_time, $end_time
    ) {
        if ($this->scheduleModel->update(
            $employee_id, $schedule_date, $start_time, $end_time
        )) {
            return true;
        } else {
            return false;
        }
    }
}