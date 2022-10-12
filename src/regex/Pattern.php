<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\regex;
use qwephp\Regex;

/**
 * @deprecated
 * @see Regex
 */
class Pattern
{
    //匹配UTF8中文
    const UTF8_ZH_CN = '/([\x{4e00}-\x{9fa5}]+)/u';
    //匹配中国手机号
    const PHONE_ZH_CN = '/^1[3-9]\d{9}$/';
    //匹配大小写字母和数字
    const ALPHA_NUMBER = '/^[a-z0-9A-Z]+$/';
    //匹配15位,18位中国身份证
    const ID_CARD_ZH_CN = '/(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}$)/';
}