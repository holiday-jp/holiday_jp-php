# holiday_jp PHP [![test](https://github.com/holiday-jp/holiday_jp-php/workflows/test/badge.svg)](https://github.com/holiday-jp/holiday_jp-php/actions) [![Packagist](https://img.shields.io/packagist/v/holiday-jp/holiday_jp.svg)](https://packagist.org/packages/holiday-jp/holiday_jp)

Get holidays in Japan.

## Installation

```json
{
  "require": {
    "holiday-jp/holiday_jp": "*"
  }
}
```

```php
require 'vendor/autoload.php';

use HolidayJp\HolidayJp;

$holidays = HolidayJp::between(new DateTime('2010-09-14'), new DateTime('2010-09-21'))

echo $holidays[0]['name'] // 敬老の日
```
