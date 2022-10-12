<?php

namespace qwephp\tests;

use phpDocumentor\Reflection\Types\True_;
use qwephp\Assertion;

class AssertionTest extends \Codeception\Test\Unit
{
    public function testNull()
    {
        $this->assertTrue(Assertion::isNull(null));
        $this->assertTrue(Assertion::isNull(''));
        $this->assertTrue(Assertion::isNull([]));
        $this->assertTrue(Assertion::isNull(0));
        $this->assertFalse(Assertion::isNull(1));
        $this->assertFalse(Assertion::isNull('0'));
        $this->assertFalse(Assertion::isNull([[]]));
        $this->assertFalse(Assertion::isNull(true));
        $this->assertTrue(Assertion::isNull(false));
    }
}