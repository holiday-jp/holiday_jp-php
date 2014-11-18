<?php

namespace HolidayJp;

use HolidayJp\HolidayJp\Holidays;
use DateTime;

class HolidayJp
{
    private static function format(DateTime $date)
    {
        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('d');
        return new DateTime($year . '-' . $month . '-' . $day);
    }
    
    public static function between(DateTime $start, DateTime $last)
    {
        $seleted = array();
        $start = self::format($start);
        $last = self::format($last);
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