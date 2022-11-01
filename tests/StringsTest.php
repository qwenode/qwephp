<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\tests;

use Codeception\Test\Unit;
use qwephp\SS as Strings;

class StringsTest extends Unit
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
        $this->assertEquals(Strings::trim('a '), 'a');
        $this->assertEquals(Strings::trim("a \n\r\t"), 'a');
        $this->assertEquals(Strings::trim(".a.,", ',.'), 'a');
        $this->assertEquals(Strings::stripSpace("a b c d "), 'abcd');
    }

    public function testReplaceMultipleSpaceToSingle()
    {
        $this->assertEquals(Strings::replaceMultipleSpaceToSingle('a  b'), 'a b');
        $this->assertEquals(Strings::replaceMultipleSpaceToSingle('a    b   c'), 'a b c');
    }

    public function testGetLastElementBySplit()
    {
        $this->assertEquals(Strings::getLastElementBySplit("awefwe/bbb", "/"), "bbb");
        $this->assertEquals(Strings::getFirstElementBySplit("awefwe/awefwe1/bbb/wegew", "/"), "awefwe");
    }
}