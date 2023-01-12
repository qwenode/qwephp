<?php
/*
 * @copyright  Copyright (c) 2021 www.qwephp.com, All rights reserved.
 * @link       https://github.com/qwenode/qwephp
 * @license    MIT
 */

namespace qwephp\tests;

use Codeception\Test\Unit;
use qwephp\NN;
use qwephp\SS;

class NumberTest extends Unit
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
        $this->assertEquals(NN::round(0.00,2),0.00);
        $this->assertEquals(NN::round('0.00',2),0.00);
        $this->assertEquals(NN::round('1.0',2),1.00);
        $this->assertEquals(NN::round('1.000111',2),1.00);
    }
    
}