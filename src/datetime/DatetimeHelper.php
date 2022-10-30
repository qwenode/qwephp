<?php

namespace qwephp\datetime;
/**
 * @deprecated
 */
class DatetimeHelper
{
    /**
     * @param TimeHelper $TimeHelper
     * @return TimeHelper
     */
    public static function beginningOfTheDay(TimeHelper $TimeHelper): TimeHelper
    {
        return TimeHelper::fromString($TimeHelper->toString('Y-m-d 00:00:00'));
    }

    /**
     * @param TimeHelper $TimeHelper
     * @return TimeHelper
     */
    public static function endOfTheDay(TimeHelper $TimeHelper): TimeHelper
    {
        return TimeHelper::fromString($TimeHelper->toString('Y-m-d 23:59:59'));
    }
}