<?php

namespace qwephp\datetime;

class DatetimeHelper
{
    /**
     * @param Time $time
     * @return Time
     */
    public static function beginningOfTheDay(Time $time): Time
    {
        return Time::fromString($time->toString('Y-m-d 00:00:00'));
    }

    /**
     * @param Time $time
     * @return Time
     */
    public static function endOfTheDay(Time $time): Time
    {
        return Time::fromString($time->toString('Y-m-d 23:59:59'));
    }
}