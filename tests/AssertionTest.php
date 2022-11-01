<?php

namespace qwephp\tests;

use Codeception\Test\Unit;
use qwephp\AA;

class AssertionTest extends Unit
{
    public function testNull()
    {
        $this->assertTrue(AA::isNull(null));
        $this->assertTrue(AA::isNull(''));
        $this->assertTrue(AA::isNull([]));
        $this->assertTrue(AA::isNull(0));
        $this->assertFalse(AA::isNull(1));
        $this->assertFalse(AA::isNull('0'));
        $this->assertFalse(AA::isNull([[]]));
        $this->assertFalse(AA::isNull(true));
        $this->assertTrue(AA::isNull(false));
        
    }
    
    public function testLengthBetween()
    {
        $this->assertTrue(AA::lenAreBetween('aa', 1, 2));
        $this->assertTrue(AA::lenAreBetween('aa', 2, 1));
        $this->assertTrue(AA::lenAreBetween('aa', 2, 3));
        $this->assertTrue(AA::lenAreBetween('aa', 2, 2));
        $this->assertFalse(AA::lenAreBetween('aa', 5, 3));
        $this->assertFalse(AA::lenAreBetween('aa', 11, 21));
    }
}