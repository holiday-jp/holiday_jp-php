<?php
namespace HolidayJp\Tests;

use Symfony\Component\Yaml\Yaml;
use HolidayJp\HolidayJp;
use DateTime;

date_default_timezone_set('Asia/Tokyo');

class HolidayJpTest extends \PHPUnit_Framework_TestCase
{

    /**
     * test_between
     * 
     */
    public function test_between(){
        $holidays = HolidayJp::between(new DateTime('2009-01-01'), new DateTime('2009-01-31'));
        $new_year_day = $holidays[0];
        $this->assertTrue(($new_year_day['date'] == new DateTime('2009-01-01')));
        $this->assertTrue(($new_year_day['name'] === '元日'));
        $this->assertTrue(($new_year_day['name_en'] === "New Year's Day"));
        $this->assertTrue(($new_year_day['week'] === '木'));

        $this->assertTrue(($holidays[1]['date'] == new DateTime('2009-01-12')));
        $this->assertTrue(($holidays[1]['name'] === '成人の日'));

        $holidays = HolidayJp::between(new DateTime('2008-12-23'), new DateTime('2009-01-12'));
        $this->assertTrue(($holidays[0]['date'] == new DateTime('2008-12-23')));
        $this->assertTrue(($holidays[1]['date'] == new DateTime('2009-01-01')));
        $this->assertTrue(($holidays[2]['date'] == new DateTime('2009-01-12')));
    }
    
    /**
     * test_isHoliday
     *
     */
    public function test_isHoliday(){
        $date = new DateTime('2011-09-19');
        $this->assertTrue(HolidayJp::isHoliday($date));
        $date = new DateTime('2011-09-18');
        $this->assertFalse(HolidayJp::isHoliday($date));
    }

    /**
     * test_MountainDayFrom2016
     *
     */
    public function test_MountainDayFrom2016(){
        $date = new DateTime('2015-08-11');
        $this->assertFalse(HolidayJp::isHoliday($date));

        for ($year = 2016; $year <= 2050; $year++) {
            $date = new DateTime($year . '-08-11');
            $this->assertTrue(HolidayJp::isHoliday($date));
        }
    }
    
}