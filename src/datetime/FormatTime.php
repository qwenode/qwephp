<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\datetime;


/**
 * Class FormatTime
 * @package qwephp\datetime
 */
class FormatTime
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