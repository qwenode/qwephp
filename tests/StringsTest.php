<?php

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
    }
}