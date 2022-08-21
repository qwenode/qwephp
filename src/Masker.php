<?php

namespace qwephp;

class Masker
{
    /**
     * @param $str
     * @param int $middleLength
     * @param string $maskString
     * @param int $prefixKeep
     * @param int $suffixKeep
     * @return string
     */
    public static function string($str, int $middleLength = 3, string $maskString = '*', int $prefixKeep = 1, int $suffixKeep = 1)
    {
        $prefixStr = substr($str, 0, $prefixKeep);
        $suffixStr = substr($str, $suffixKeep * -1);
        $str_pad   = str_pad('', $middleLength, $maskString);
        return $prefixStr . $str_pad . $suffixStr;
    }
}