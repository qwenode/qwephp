<?php
namespace qwephp\tests;
use Codeception\Test\Unit;
use qwephp\TT;

class DateTimesTest extends Unit
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
        date_default_timezone_set('Asia/Shanghai');
        $this->assertEquals(TT::begin(1600165627), 1600099200);
        $this->assertEquals(TT::end(1600165633), 1600185599);
    }
}