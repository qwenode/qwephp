<?php
/**
 * Copyright (c) 2020.
 *  @license    MIT
 *  @copyright  Copyright (C) www.qwephp.com, All rights reserved.
 *  @link       https://github.com/qwenode/qwephp
 *  @author    qwenode <dtfreemandev@gmail.com>
 */

namespace qwephp;
class Strings
{
    public static function trim(string $value, string $charlist = " \t\n\r\0\x0B"): string
    {
        return trim($value, $charlist);
    }

}