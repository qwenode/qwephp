<?php

namespace qwephp\assert;

use ErrorException;
use qwephp\Strings;

/**
 * @deprecated
 * @see \qwephp\Assertion
 */
class AssertionThrow
{
    /**
     * @param $value array|string
     * @param string $message
     * @throws ErrorException
     */
    public static function notNull($value, $message = '数据不能为空', ...$messageParam)
    {
        if (!Assertion::notNull($value)) {
            throw new ErrorException(Strings::sprintf($message, $messageParam));
        }
        
    }

    /**
     * @param string $value
     * @param int $min
     * @param string $message
     * @throws ErrorException
     */
    public static function minLength(string $value, int $min, string $message = '数据长度太短', ...$messageParam)
    {
        if (!Assertion::minLength($value, $min)) {
            throw new ErrorException(Strings::sprintf($message, $messageParam));
        }
    }

    /**
     * @param string $value
     * @param int $max
     * @param string $message
     * @throws ErrorException
     */
    public static function maxLength(string $value, int $max, string $message = '数据长度太长')
    {
        if (!Assertion::maxLength($value, $max)) {
            throw new ErrorException($message);
        }
    }
}