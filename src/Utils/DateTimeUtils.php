<?php

namespace Utils;

use DateTimeImmutable;
use App\Middleware\MiddlewareException;

class DateTimeUtils
{
    public static function now(): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat('U', time());
    }

    public static function deliveryDate(string $date, string $time): DateTimeImmutable
    {
        $deliveryDate = DateTimeImmutable::createFromFormat('Y-m-dH:i', $date . $time);
        if($deliveryDate === false)
        {
            throw new MiddlewareException("date must be a string in YYYY-MM-DD format");
        }

        return $deliveryDate;
    }
}
