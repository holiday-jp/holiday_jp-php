<?php

namespace HolidayJp;

use Carbon\Carbon;
use HolidayJp\HolidayJp\Holidays;
use DateTime;

class HolidayJp
{    
    public static function between(DateTime $start, DateTime $last)
    {
        $seleted = array();
        foreach (Holidays::$holidays as $date => $value) {
            $d = new DateTime($date);
            if ($start <= $d && $d <= $last) {
                $value['date'] = $d;
                $seleted[] = $value;
            }
        }
        return $seleted;
    }

    public static function isHoliday(DateTime $date)
    {
        return array_key_exists($date->format('Y-m-d'), Holidays::$holidays);
    }
}