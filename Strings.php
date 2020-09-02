<?php

namespace qwenode\qwephp;
class Strings
{
    public static function trim(string $value ,string $charlist= " \t\n\r\0\x0B"):string
    {
        return trim($value,$charlist);
    }
}