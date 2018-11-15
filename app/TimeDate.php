<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class TimeDate extends Model
{
    public $datetime;

    public function __construct($date) {
        $this->datetime = $date;
    }

    public function timeSince() {
        $now = new DateTime;
        $then = new DateTime($this->datetime);
        $days = $then->diff($now)->days;
        if ($days > 364) {
            $years = floor($days / 365);
            if ($years == 1) {
                return "1 year";
            }
            return "$years years";
        }
        if ($days > 29) {
            $months = floor($days / 30);
            if ($months == 1) {
                return "1 month";
            }
            return "$months months";
        }
        if ($days < 2) {
            return "1 day";
        }
        return "$days days";
    }
}
