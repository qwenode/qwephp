<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\sanitize;


use qwephp\Strings;

class Sanitize
{
    /**
     * 移除非字母
     * @param string $str
     * @return string
     */
    public static function alpha($str): string
    {
        return trim(preg_replace('/[^a-z]/i', '', $str));
    }

    /**
     * 移除非数字
     * @param string $str
     * @return string
     */
    public static function int($str): string
    {
        return preg_replace('/[^0-9]/i', '', $str);
    }

    /**
     * 移除非数字
     * @param string $str
     * @return string
     */
    public static function firstInt($str): string
    {
        $i = self::float($str);
        return Strings::getFirstElementBySplit($i, '.');
    }

    /**
     * 移除非浮点数
     * @param string $str
     * @return string
     */
    public static function float($str): string
    {
        $r = preg_replace('/[^0-9.]/i', '', $str);
        $r = trim($r);
        $r = trim($r, '.');
        if (substr_count($r, '.') >= 2) {
            return substr($r, 0, strrpos($r, '.'));
        }
        return $r;
    }

    /**
     * @param $s
     * @return string
     */
    public static function filename($s)
    {
        // sanitize filename
        $filename = preg_replace(
            '~
        [<>:"/\\|?*]|            # file system reserved https://en.wikipedia.org/wiki/Filename#Reserved_characters_and_words
        [\x00-\x1F]|             # control characters http://msdn.microsoft.com/en-us/library/windows/desktop/aa365247%28v=vs.85%29.aspx
//        [\x7F\xA0\xAD]|          # non-printing characters DEL, NO-BREAK SPACE, SOFT HYPHEN
        [#\[\]@!$&\'()+,;=]|     # URI reserved https://tools.ietf.org/html/rfc3986#section-2.2
        [{}^\~`]                 # URL unsafe characters https://www.ietf.org/rfc/rfc1738.txt
        ~x',
            '-', $s);
        $filename = trim($filename, '.-');
        return $filename;
    }
}