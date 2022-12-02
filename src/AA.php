<?php

namespace qwephp;

/**
 *
 */
class AA
{
    public static function tempDuplicate($key)
    {
        static $list = [];
        if (key_exists($key, $list)) {
            return true;
        }
        $list[$key] = true;
        return false;
    }
    
    /**
     * @param bool $assertResult
     * @param string $message
     * @param ...$messageParams
     * @return void
     * @throws AssertionFailedException
     */
    public static function throwAtTrue(bool $assertResult, string $message, ...$messageParams)
    {
        self::throwAtFalse(!$assertResult, $message, $messageParams);
    }
    
    /**
     * @param bool $assertResult
     * @param string $message
     * @param ...$messageParams
     * @return void
     * @throws AssertionFailedException
     */
    public static function throwAtFalse(bool $assertResult, string $message, ...$messageParams)
    {
        if ($assertResult === false) {
            throw new AssertionFailedException(SS::sprintfWithArrayParams($message, $messageParams));
        }
    }
    
    /**
     * @param $assertResult
     * @param string $message
     * @param ...$messageParams
     * @return void
     * @throws AssertionFailedException
     */
    public static function throwAtNull($assertResult, string $message, ...$messageParams)
    {
        if (AA::isNull($assertResult)) {
            throw new AssertionFailedException(SS::sprintfWithArrayParams($message, $messageParams));
        }
    }
    
    /**
     * @param $assertResult
     * @param string $message
     * @param ...$messageParams
     * @return void
     * @throws AssertionFailedException
     */
    public static function throwAtNotNull($assertResult, string $message, ...$messageParams)
    {
        if (AA::notNull($assertResult)) {
            throw new AssertionFailedException(SS::sprintfWithArrayParams($message, $messageParams));
        }
    }
    
    public static function isNull($value): bool
    {
        return !self::notNull($value);
    }
    
    public static function anyAreNull(...$fields): bool
    {
        foreach ($fields as $field) {
            if (self::isNull($field)) {
                return true;
            }
        }
        return false;
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
    public static function lenAreBetween($str, int $left, int $right): bool
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
     * 数字是否介于连个数之间
     * @param int|float $i
     * @param int|float $min
     * @param int|float $max
     * @return bool
     */
    public static function numberAreBetween(int|float $i, int|float $min, int|float $max): bool
    {
        if ($min > $max) {
            $mid = $min;
            $min = $max;
            $max = $mid;
        }
        return $i >= $min && $i <= $max;
    }
}