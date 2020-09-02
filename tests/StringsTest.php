<?php
/**
 * Copyright (c) 2020.
 *  @license    MIT
 *  @copyright  Copyright (C) www.qwephp.com, All rights reserved.
 *  @link       https://github.com/qwenode/qwephp
 *  @author    qwenode <dtfreemandev@gmail.com>
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
    }
}