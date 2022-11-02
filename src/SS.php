<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp;

use JsonException;

/**
 * string helper
 */
class SS
{
    /**
     * @param string $value
     * @param string $charlist
     * @return string
     * @see trim()
     */
    public static function trim(?string $value, string $charlist = " \t\n\r\0\x0B"): string
    {
        if (AA::isNull($value)) {
            return $value;
        }
        return trim($value, $charlist);
    }
    
    /**
     * @param string|null $value
     * @return void
     */
    public static function stripTags($value): string
    {
        if ($value == null) {
            return '';
        }
        return strip_tags($value);
    }
    
    /**
     * @param string $str
     * @param string $find
     * @param bool $reverseCompare 是否反向对比
     * @return bool
     */
    public static function contain(?string $str, ?string $find, bool $reverseCompare = false): bool
    {
        if ($str == null) {
            return false;
        }
        if (stripos($str, $find) !== false) {
            return true;
        }
        if ($reverseCompare && stripos($find, $str) !== false) {
            return true;
        }
        return false;
    }
    
    /**
     * @param string $str
     * @return array
     */
    public static function extractUrls(?string $str): array
    {
        if (AA::isNull($str)) {
            return [];
        }
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $str, $match);
        if (isset($match[0])) {
            return $match[0];
        }
        return [];
    }
    
    /**
     * @param string $str
     * @return string
     */
    public static function extractFirstUrl(?string $str): string
    {
        if (AA::isNull($str)) {
            return '';
        }
        $extractUrls = self::extractUrls($str);
        if (empty($extractUrls)) {
            return '';
        }
        return array_shift($extractUrls);
    }
    
    /**
     *
     * @param string|null $str
     * @param array $findList
     * @param bool $reverseCompare
     * @return bool
     */
    public static function containArray(?string $str, ?array $findList, bool $reverseCompare = false): bool
    {
        if ($str == null || $findList == null) {
            return false;
        }
        foreach ($findList as $item) {
            if (self::contain($str, $item, $reverseCompare)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * remove all whitespace
     * @param string $value
     * @return string
     */
    public static function stripSpace(?string $value): string
    {
        if (AA::isNull($value)) {
            return '';
        }
        return preg_replace('/\s+/', '', $value);
    }
    
    /**
     * Convert the given string to upper-case.
     *
     * @param string $value
     * @return string
     */
    public static function upper($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }
    
    /**
     * 返回数据中第一个不为空的数据
     * @param array $data
     * @return mixed|string|null
     */
    public static function firstOne(array $data)
    {
        foreach ($data as $datum) {
            if (AA::notNull($datum)) {
                return $datum;
            }
        }
        return null;
    }
    
    /**
     * @param string $str
     * @param string $needle
     * @param bool $caseSensitive
     * @return bool
     */
    public static function startsWith($str, $needle, bool $caseSensitive = false)
    {
        if ($caseSensitive === false) {
            $str    = strtoupper($str);
            $needle = strtoupper($needle);
        }
        return str_starts_with($str, $needle);
    }
    
    /**
     * @param string $str
     * @param string $needle
     * @param bool $caseSensitive
     * @return bool
     */
    public static function endsWith($str, $needle, bool $caseSensitive = false)
    {
        if ($caseSensitive === false) {
            $str    = strtoupper($str);
            $needle = strtoupper($needle);
        }
        return str_ends_with($str, $needle);
    }
    
    /**
     * Limit the number of characters in a string.
     *
     * @param string $value
     * @param int $limit
     * @param string $end
     * @return string
     */
    public static function limit($value, $limit = 100, $end = '...')
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }
        
        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }
    
    /**
     * Return the length of the given string.
     *
     * @param string $value
     * @param string|null $encoding
     * @return int
     */
    public static function length($value, $encoding = null)
    {
        if ($encoding) {
            return mb_strlen($value, $encoding);
        }
        
        return mb_strlen($value);
    }
    
    /**
     * Determine if a given string is valid JSON.
     *
     * @param string $value
     * @return bool
     */
    public static function isJson($value)
    {
        if (!is_string($value)) {
            return false;
        }
        
        try {
            json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Convert the given string to lower-case.
     *
     * @param string $value
     * @return string
     */
    public static function lower($value)
    {
        return mb_strtolower($value, 'UTF-8');
    }
    
    /**
     * Reverse the given string.
     *
     * @param string $value
     * @return string
     */
    public static function reverse(string $value)
    {
        return implode(array_reverse(mb_str_split($value)));
    }
    
    public static function replaceMultipleSpaceToSingle(?string $value): string
    {
        if (AA::isNull($value)) {
            return '';
        }
        return preg_replace('/\s+/', ' ', $value);
    }
    
    public static function getLastElementBySplit(?string $str, ?string $sep): string
    {
        if (AA::isNull($str) || AA::isNull($sep)) {
            return '';
        }
        $e = explode($sep, $str);
        if (count($e) <= 0) {
            return $str;
        }
        return array_pop($e);
    }
    
    public static function getFirstElementBySplit(?string $str, ?string $sep): string
    {
        if (AA::isNull($str) || AA::isNull($sep)) {
            return '';
        }
        $e = explode($sep, $str);
        if (count($e) <= 0) {
            return $str;
        }
        return array_shift($e);
    }
    
    /**
     * \r\n \r \n replace to \n
     * @param string $str
     * @return array|string
     */
    public static function nl2n(?string $str): array|string
    {
        if (AA::isNull($str)) {
            return '';
        }
        $str = str_replace(["\r\n", "\n\r", "\n\n", "\n\n\n"], "\n", $str);
        $str = str_replace(["\r\n", "\n\r", "\n\n", "\n\n\n"], "\n", $str);
        return str_replace(["\r\n", "\n\r", "\n\n", "\r"], "\n", $str);
    }
    
    /**
     * 给敏感信息打码
     * @param $str
     * @param int $middleLength
     * @param string $maskString
     * @param int $prefixKeep
     * @param int $suffixKeep
     * @return string
     */
    public static function mask($str, int $middleLength = 3, string $maskString = '*', int $prefixKeep = 1, int $suffixKeep = 1)
    {
        $prefixStr = substr($str, 0, $prefixKeep);
        $suffixStr = substr($str, $suffixKeep * -1);
        $str_pad   = str_pad('', $middleLength, $maskString);
        return $prefixStr . $str_pad . $suffixStr;
    }
    
    /**
     * 调用方式: Strings::sprintf('abc{}haha',123); 返回: abc123haha
     * @param string $message
     * @param ...$params
     * @return string
     */
    public static function sprintf($message, ...$params)
    {
        return self::sprintfWithArrayParams($message, $params);
    }
    
    /**
     * 调用方式: Strings::sprintfWithArrayParams('abc{}haha',[123]); 返回: abc123haha
     * @param $message
     * @param array $params
     * @return string
     */
    public static function sprintfWithArrayParams($message, array $params)
    {
        if (AA::isNull($message)) {
            return '';
        }
        $explode = explode('{}', $message);
        $newMsg  = '';
        foreach ($explode as $k => $value) {
            $newMsg .= $value;
            if (isset($params[$k])) {
                $fillValue = $params[$k];
                if (is_array($fillValue)) {
                    $fillValue = json_encode($fillValue);
                }
                $newMsg .= $fillValue;
            }
        }
        return $newMsg;
    }
    
    /**
     * 移除非字母
     * @param string $str
     * @return string
     */
    public static function toAlpha($str): string
    {
        if ($str === null) {
            return '';
        }
        return trim(preg_replace('/[^a-z]/i', '', $str));
    }
    
    /**
     * 移除非数字
     * @param string $str
     * @return int
     */
    public static function toInt($str): int
    {
        if ($str == null) {
            return 0;
        }
        return (int)preg_replace('/[^0-9]/i', '', $str);
    }
    
    /**
     * 移除非数字
     * @param string $str
     * @return string
     */
    public static function extractFirstInt($str): string
    {
        $i = self::toFloat($str);
        return SS::getFirstElementBySplit($i, '.');
    }
    
    /**
     * 移除非浮点数
     * @param string $str
     * @return float
     */
    public static function toFloat($str): float
    {
        if ($str == null) {
            return 0;
        }
        $r = preg_replace('/[^0-9.]/i', '', $str);
        $r = trim($r);
        $r = trim($r, '.');
        if (substr_count($r, '.') >= 2) {
            return (float)substr($r, 0, strrpos($r, '.'));
        }
        return (float)$r;
    }
    
    /**
     * @param $s
     * @return string
     */
    public static function stripFileName($s)
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
            '_', $s);
        $filename = trim($filename, '._');
        return $filename;
    }
    
    /**
     * remove special char
     * @param string $str
     * @return string
     */
    public static function removeSpecialChar($str)
    {
        return str_replace(
            [
                '<', '>', '/', '\\', '.', '(', ')', '[', ']', '{', '}', '=', '-', '_', '*', '&', '^', '%', '$', '@', '!', '#',
                '～', '，', '。', '！', '？', '"', "'", '“', '”', '【', '】', '『', '』', '：', '；', '《', '》', '’', '‘', '·', '~', ';',
                '`', '|',
            ],
            '', $str);
    }
}