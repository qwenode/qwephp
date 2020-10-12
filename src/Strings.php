<?php
/*
 * @copyright  Copyright (c) 2020 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp;
class Strings
{
    /**
     * @param string $value
     * @param string $charlist
     * @return string
     * @see trim()
     */
    public static function trim(string $value, string $charlist = " \t\n\r\0\x0B"): string
    {
        return trim($value, $charlist);
    }

    /**
     * remove all whitespace
     * @param string $value
     * @return string
     */
    public static function stripSpace(string $value): string
    {
        return preg_replace('/\s+/', '', $value);
    }

    public static function replaceMultipleSpaceToSingle(string $val): string
    {
        return preg_replace('/\s+/', ' ', $val);
    }
}