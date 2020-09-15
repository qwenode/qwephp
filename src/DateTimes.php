<?php
/*
 * @copyright  Copyright (c) 2020 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp;


class DateTimes
{
    public static function getBeginOfTheDayByUnix(int $unixTime): int
    {
        return strtotime(date('Y-m-d 00:00:00', $unixTime));
    }

    public static function getEndOfTheDayByUnix(int $unixTime): int
    {
        return strtotime(date('Y-m-d 23:59:59', $unixTime));
    }
}