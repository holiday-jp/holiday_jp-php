# holiday_jp PHP

[![Build Status](https://travis-ci.org/k1LoW/holiday_jp-php.svg?branch=master)](https://travis-ci.org/k1LoW/holiday_jp-php)

Get holidays in Japan.

This is ported from [komagata/holiday_jp](https://github.com/komagata/holiday_jp).

## Installation

```json
{
  "require": {
    "k1low/holiday_jp": "*"
  }
}
```

```php
require 'vendor/autoload.php';

use HolidayJp\HolidayJp;

$holidays = HolidayJp::between(new DateTime('2010-09-14'), new DateTime('2010-09-21'))

echo $holidays[0]['name'] // 敬老の日
```
