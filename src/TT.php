<?php

namespace qwephp;
use DateTime;

/**
 * time helper
 */
class TT
{
    /**
     * @param int $unixTime
     * @return int
     * @deprecated
     * @see formatToDayBegin
     */
    public static function begin(int $unixTime)
    {
        $x = date('Y-m-d 00:00:00', $unixTime);
        return strtotime($x);
    }
    
    /**
     * @param int $unixTime
     * @return false|int
     */
    public static function formatToDayBegin(int $unixTime)
    {
        $x = date('Y-m-d 00:00:00', $unixTime);
        return strtotime($x);
    }
    /**
     * @param int $unixTime
     * @return int
     * @deprecated
     * @see formatToDayEnd
     */
    public static function end(int $unixTime)
    {
        $x = date('Y-m-d 23:59:59', $unixTime);
        return strtotime($x);
    }
    
    /**
     * @param int $unixTime
     * @return false|int
     */
    public static function formatToDayEnd(int $unixTime)
    {
        $x = date('Y-m-d 23:59:59', $unixTime);
        return strtotime($x);
    }
    public static function formatToMonthBegin(int $unixTime)
    {
       return strtotime(date('Y-m 00:00:00',$unixTime));
    }
    
    public static function formatToMonthEnd(int $unixTime)
    {
        return strtotime(date('Y-m-t 23:59:59',$unixTime));
    }
    public static function getCurrentMonthBegin()
    {
        $strtotime = strtotime(date('Y-m 00:00:00'));
        return $strtotime;
    }
    
    public static function getCurrentMonthEnd()
    {
        return strtotime(date('Y-m-t 23:59:59'));
    }
    
    public static function toTimeElapsed(string $datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}