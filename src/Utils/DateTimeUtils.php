<?php

namespace Utils;

use DateTimeImmutable;

class DateTimeUtils
{
    public static function now(): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat('U', time());
    }
}
