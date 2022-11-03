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
}