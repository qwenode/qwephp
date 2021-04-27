<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\regex;

class Pattern
{
    const UTF8_ZH_CN = '/([\x{4e00}-\x{9fa5}]+)/u';//匹配UTF8中文
    const PHONE_ZH_CN = '/^1[3-9]\d{9}$/';//匹配中国手机号
    const ALPHA_NUMBER = '/^[a-z0-9A-Z]+$/';//匹配大小写字母和数字
}