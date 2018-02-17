<?php
/**
 * generate HolidayJp/Holidays.php
 *
 */
date_default_timezone_set('Asia/Tokyo');
require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$holidays = Yaml::parse(file_get_contents('holiday_jp/holidays_detailed.yml'));

$timestamp = date('Y-m-d H:i:s');
echo <<<EOS
<?php
// Generated from holidays_detailed.yml at $timestamp
namespace HolidayJp\HolidayJp;

/**
 * Holidays
 *
 */
class Holidays
{

    public static \$holidays = array(

EOS;

foreach ($holidays as $date => $value) {
    $dateStr = date('Y-m-d', $date);
    echo "        '" . $dateStr . "' => array(" . "\n";
    echo "            'date' => '" . $dateStr . "'," . "\n";
    echo "            'week' => '" . $value['week'] . "'," . "\n";
    echo "            'week_en' => '" . $value['week_en'] . "'," . "\n";
    echo "            'name' => '" . $value['name'] . "'," . "\n";
    echo "            'name_en' => \"" . $value['name_en'] . "\"," . "\n";
    echo "        )," . "\n";
}

echo <<<EOE
    );
    
}
EOE;
