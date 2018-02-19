# holiday_jp PHP [![Build Status](https://travis-ci.org/holiday-jp/holiday_jp-php.svg?branch=master)](https://travis-ci.org/holiday-jp/holiday_jp-php) [![Packagist](https://img.shields.io/packagist/v/holiday-jp/holiday_jp.svg)](https://packagist.org/packages/holiday-jp/holiday_jp)

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
