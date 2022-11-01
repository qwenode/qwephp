<?php

namespace qwephp;
/**
 *
 */
class AA
{
    /**
     * @deprecated
     * @param bool $assertResult
     * @param string $message
     * @param ...$messageParams
     * @return void
     * @throws AssertionFailedException
     */
    public static function throw(bool $assertResult, string $message, ...$messageParams)
    {
        if ($assertResult===false) {
            throw new AssertionFailedException(S::sprintfWithArrayParams($message, $messageParams));
        }
    }
    
    /**
     * @throws AssertionFailedException
     */
    public static function throwAtTrue(bool $assertResult, string $message, ...$messageParams)
    {
        self::throwAtFalse(!$assertResult,$message,$messageParams);
    }
    
    /**
     * @throws AssertionFailedException
     */
    public static function throwAtFalse(bool $assertResult, string $message, ...$messageParams)
    {
        if ($assertResult===false) {
            throw new AssertionFailedException(S::sprintfWithArrayParams($message, $messageParams));
        }
    }
    public static function isNull($value): bool
    {
        return !self::notNull($value);
    }
    
    /**
     * @param $value array|string
     * @return bool
     */
    public static function notNull($value): bool
    {
        if (is_array($value)) {
            if (count($value) == 0) {
                return false;
            }
        }
        if (!isset($value)) {
            return false;
        }
        if (is_string($value) && strlen(trim($value)) <= 0) {
            return false;
        }
        if (empty($value) && $value !== '0') {
            return false;
        }
    
        return true;
    }
    
    /**
     * @param string $str
     * @param int $maxLength
     * @return bool
     */
    public static function isTooLong($str, int $maxLength)
    {
        if (SS::length($str) > $maxLength) {
            return true;
        }
        return false;
    }
    
    /**
     * @param string $str
     * @param int $minLength
     * @return bool
     */
    public static function isTooShort($str, int $minLength)
    {
        if (SS::length($str) < $minLength) {
            return true;
        }
        return false;
    }
    
    /**
     * 长度是否介于两个数之间
     * @param string $str
     * @param int $left
     * @param int $right
     * @return bool
     */
    public static function lenAreBetween($str, int $left, int $right)
    {
        $len = SS::length($str);
        if ($left > $right) {
            $mid   = $left;
            $left  = $right;
            $right = $mid;
        }
        return ($len >= $left && $len <= $right);
    }
    
    /**
     * 确保字符串包含一定数量的字符
     * @param string $value
     * @param int $min
     * @return bool
     */
    public static function minLength(string $value, int $min): bool
    {
        return self::strlen($value) >= $min;
    }
    
    /**
     * 确保字符串不超过限定长度
     * @param string $value
     * @param int $max
     * @return bool
     */
    public static function maxLength(string $value, int $max): bool
    {
        return self::strlen($value) <= $max;
    }
    
    protected static function strlen($value): int
    {
        if (!function_exists('mb_detect_encoding')) {
            return strlen($value);
        }
        
        if (false === $encoding = mb_detect_encoding($value)) {
            return strlen($value);
        }
        
        return mb_strlen($value, $encoding);
    }
}