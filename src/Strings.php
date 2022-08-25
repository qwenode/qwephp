<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
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
    public static function extractUrls(string $str): array
    {
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
    public static function extractFirstUrl(string $str): string
    {
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
    public static function containArray(?string $str, array $findList, bool $reverseCompare = false): bool
    {
        if ($str == null) {
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
    public static function stripSpace(string $value): string
    {
        return preg_replace('/\s+/', '', $value);
    }

    public static function replaceMultipleSpaceToSingle(string $val): string
    {
        return preg_replace('/\s+/', ' ', $val);
    }

    public static function getLastElementBySplit(string $str, string $sep): string
    {
        $e = explode($sep, $str);
        if (count($e) <= 0) {
            return $str;
        }
        return array_pop($e);
    }

    public static function getFirstElementBySplit(string $str, string $sep): string
    {
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
    public static function nl2n(string $str): array|string
    {
        $str = str_replace(["\r\n", "\n\r", "\n\n", "\n\n\n"], "\n", $str);
        $str = str_replace(["\r\n", "\n\r", "\n\n", "\n\n\n"], "\n", $str);
        return str_replace(["\r\n", "\n\r", "\n\n", "\r"], "\n", $str);
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

}