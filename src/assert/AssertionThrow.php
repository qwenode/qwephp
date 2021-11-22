<?php

namespace qwephp\assert;

use ErrorException;

/**
 *
 */
class AssertionThrow
{
    /**
     * @param $value array|string
     * @param string $message
     * @throws ErrorException
     */
    public static function notNull($value, $message = '数据不能为空')
    {
        if (!Assertion::notNull($value)) {
            throw new ErrorException($message);
        }
    }
}