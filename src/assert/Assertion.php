<?php

namespace qwephp\assert;

/**
 *
 */
class Assertion
{
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
        if (!isset($value)) {
            return false;
        }
        if (empty($value)) {
            return false;
        }
        if ($value == '') {
            return false;
        }
        if (is_array($value)) {
            if (count($value) == 0) {
                return false;
            }
        }
        return true;
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