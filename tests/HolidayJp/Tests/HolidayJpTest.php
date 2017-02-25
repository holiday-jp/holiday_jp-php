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
        $this->assertEquals(new DateTime('2009-01-01'), $new_year_day['date']);
        $this->assertEquals('元日', $new_year_day['name']);
        $this->assertEquals("New Year's Day", $new_year_day['name_en']);
        $this->assertEquals('木', $new_year_day['week']);

        $this->assertEquals(new DateTime('2009-01-12'), $holidays[1]['date']);
        $this->assertEquals('成人の日', $holidays[1]['name']);

        $holidays = HolidayJp::between(new DateTime('2008-12-23'), new DateTime('2009-01-12'));
        $this->assertEquals(new DateTime('2008-12-23'), $holidays[0]['date']);
        $this->assertEquals(new DateTime('2009-01-01'), $holidays[1]['date']);
        $this->assertEquals(new DateTime('2009-01-12'), $holidays[2]['date']);
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

    /**
     * test_betweenSeconds
     *
     */
    public function test_betweenSeconds(){
       $holidays = HolidayJp::between(new DateTime('2014-09-23 00:00:01'), new DateTime('2014-09-23 00:00:01'));
       $this->assertEquals(1, count($holidays));
    }
    
    /**
     * test_countHolidays
     *
     */
    public function test_countHolidays(){
        $yamlDate = Yaml::parse(file_get_contents(dirname(__FILE__) . '/../../../holiday_jp/holidays_detailed.yml'));
        $holidays = HolidayJp::between(new DateTime('1970-01-01'), new DateTime('2050-12-31'));
        $this->assertEquals(count($yamlDate), count($holidays));
    }

    /**
     * test_fullHolidays
     *
     */
    public function test_fullHolidays(){
        $yamlDate = Yaml::parse(file_get_contents(dirname(__FILE__) . '/../../../holiday_jp/holidays_detailed.yml'));
        foreach ($yamlDate as $date => $value) {
            $this->assertTrue(HolidayJp::isHoliday(new DateTime(date('Y-m-d', $date))));
        }
    }
    
}