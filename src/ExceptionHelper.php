<?php

namespace qwephp;

use ErrorException;

/**
 * @deprecated
 */
class ExceptionHelper
{
    /**
     * @param $any
     * @param $message
     * @throws ErrorException
     */
    public static function throwIfNull($any, $message)
    {
        if ($any == null) {
            throw new ErrorException($message);
        }
    }

    /**
     * @param $any
     * @param $message
     * @throws ErrorException
     */
    public static function throwIfZero($any, $message)
    {
        if ((int)$any == 0) {
            throw new ErrorException($message);
        }
    }

    /**
     * @param string $any
     * @param $message
     * @throws ErrorException
     */
    public static function throwIfLengthZero(string $any, $message)
    {
        if (strlen(trim($any)) == 0) {
            throw new ErrorException($message);
        }
    }
}