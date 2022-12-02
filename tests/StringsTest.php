<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\tests;

use Codeception\Test\Unit;
use qwephp\SS;

class SSTest extends Unit
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
        $this->assertEquals(SS::trim('a '), 'a');
        $this->assertEquals(SS::trim("a \n\r\t"), 'a');
        $this->assertEquals(SS::trim(".a.,", ',.'), 'a');
        $this->assertEquals(SS::stripSpace("a b c d "), 'abcd');
    }
    
    public function testTrueAndFalse()
    {
        $this->assertTrue(SS::toBoolean('1'));
        $this->assertTrue(SS::toBoolean('yes'));
        $this->assertTrue(SS::toBoolean('ok'));
        $this->assertTrue(SS::toBoolean(1));
        $this->assertTrue(SS::toBoolean(true));
        $this->assertFalse(SS::toBoolean('0'));
        $this->assertFalse(SS::toBoolean('no'));
        $this->assertFalse(SS::toBoolean('false'));
        $this->assertFalse(SS::toBoolean(false));
    }
    
    public function testReplaceMultipleSpaceToSingle()
    {
        $this->assertEquals(SS::replaceMultipleSpaceToSingle('a  b'), 'a b');
        $this->assertEquals(SS::replaceMultipleSpaceToSingle('a    b   c'), 'a b c');
    }
    
    public function testGetLastElementBySplit()
    {
        $this->assertEquals(SS::getLastElementBySplit("awefwe/bbb", "/"), "bbb");
        $this->assertEquals(SS::getFirstElementBySplit("awefwe/awefwe1/bbb/wegew", "/"), "awefwe");
    }
    
    public function testRemoveString()
    {
        $this->assertEquals(SS::removeLeft('pre_xxxx', 'pre_'), 'xxxx');
        $this->assertEquals(SS::removeLeft('pre_pre_xxxx', 'pre_'), 'pre_xxxx');
        $this->assertEquals(SS::removeLeft('1pre_pre_xxxx', 'pre_'), '1pre_pre_xxxx');
        $this->assertEquals(SS::removeRight('1pre_pre_xxxx', '_xxxx'), '1pre_pre');
        $this->assertEquals(SS::removeRight('_xxxx_pre_pre', '_pre'), '_xxxx_pre');
        $this->assertEquals(SS::removeRight('_xxxx_pre', '_pre'), '_xxxx');
        $this->assertEquals(SS::removeRight('_xxxx_pre', '_pre'), '_xxxx');
        $this->assertEquals(SS::removeRight('_pre_xxxx', '_pre'), '_pre_xxxx');
    }
}