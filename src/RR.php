<?php

namespace qwephp;
/**
 * regex helper
 */
class RR
{
    //匹配UTF8中文
    const PATTERN_UTF8_ZH_CN = '/([\x{4e00}-\x{9fa5}]+)/u';
    //匹配中国手机号
    const PATTERN_PHONE_ZH_CN = '/^1[3-9]\d{9}$/';
    //匹配大小写字母和数字
    const PATTERN_ALPHA_NUMBER = '/^[a-z0-9A-Z]+$/';
    //匹配15位,18位中国身份证
    const PATTERN_ID_CARD_ZH_CN = '/(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}$)/';
    
    /**
     * 是否中文
     * @param string $str
     * @return bool
     */
    public static function isChineseText($str)
    {
        if (AA::isNull($str)) {
            return false;
        }
        return self::isMatch($str, static::PATTERN_UTF8_ZH_CN);
    }
    
    /**
     * 是否大小写字母和数字
     * @param string $str
     * @return bool
     */
    public static function isAlphaNumber($str)
    {
        if (AA::isNull($str)) {
            return false;
        }
        return self::isMatch($str, static::PATTERN_ALPHA_NUMBER);
    }
    
    /**
     * @param string $str
     * @param string $pattern
     * @return bool
     */
    public static function isMatch($str, string $pattern): bool
    {
        return boolval(preg_match($str, $pattern));
    }
}