<?php

namespace qwephp;
/**
 * time helper
 */
class TT
{
    /**
     * @param int $unixTime
     * @return int
     */
    public static function begin(int $unixTime)
    {
        $x = date('Y-m-d 00:00:00', $unixTime);
        return strtotime($x);
    }
    
    /**
     * @param int $unixTime
     * @return int
     */
    public static function end(int $unixTime)
    {
        $x = date('Y-m-d 23:59:59', $unixTime);
        return strtotime($x);
    }
}