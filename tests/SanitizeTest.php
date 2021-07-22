<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\tests;


use qwephp\sanitize\Sanitize;

class SanitizeTest extends \Codeception\Test\Unit
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
        $this->assertEquals(Sanitize::alpha('abc123d'), 'abcd');
        $this->assertEquals(Sanitize::alpha('abc123 d'), 'abcd');
        $this->assertEquals(Sanitize::alpha(' abc12#3 d'), 'abcd');
        $this->assertEquals(Sanitize::number(' abc12#3 d'), '123');
        $this->assertEquals(Sanitize::number(' abc12#.3 d'), '123');
        $this->assertEquals(Sanitize::float(' abc12#.3 d'), '12.3');
        $this->assertEquals(Sanitize::float(' abc1.223#.3 d'), '1.223');
    }

}