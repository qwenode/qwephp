<?php
/**
 * @copyright  Copyright (c) 2020 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\tests;

use qwephp\Strings;

class StringsTest extends \Codeception\Test\Unit
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
}