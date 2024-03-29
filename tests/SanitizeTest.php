<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\tests;


use Codeception\Test\Unit;
use qwephp\SS;

class SanitizeTest extends Unit
{
    
    protected function _before()
    {
    }
    
    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $this->assertEquals(SS::toAlpha('abc123d'), 'abcd');
        $this->assertEquals(SS::toAlpha('abc123 d'), 'abcd');
        $this->assertEquals(SS::toAlpha(' abc12#3 d'), 'abcd');
        $this->assertEquals(SS::toInt(' abc12#3 d'), '123');
        $this->assertEquals(SS::toInt(' abc12#.3 d'), '123');
        $this->assertEquals(SS::toFloat(' abc12#.3 d'), '12.3');
        $this->assertEquals(SS::toFloat(' abc1.223#.3 d'), '1.223');
        $this->assertEquals(SS::extractFirstInt(' abc1.223#.3 d'), '1');
        $this->assertEquals(SS::extractFirstInt(' abc12.2223#.3 d'), '12');
        $this->assertEquals(SS::removeEmoji('外贸 Dunk 11色福利上架✔️ VT纯原 “618”携手工厂 现货优势 原3XX 品质 相册实拍 售后包到底 放心冲刺🚀🚀'), '外贸 Dunk 11色福利上架️ VT纯原 “618”携手工厂 现货优势 原3XX 品质 相册实拍 售后包到底 放心冲刺');
    }

}