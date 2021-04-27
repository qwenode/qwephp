<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\regex;


/**
 * Class Match
 * @package qwephp\regex
 */
class Match
{
    /**
     * @param string $string
     * @param string $pattern
     * @return bool
     */
    public function pattern(string $string, string $pattern): bool
    {
        return boolval(preg_match($pattern, $string));
    }
}