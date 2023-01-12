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
        $this->assertEquals(TT::formatToDayBegin(1600165627), 1600099200);
        $this->assertEquals(TT::formatToDayEnd(1600165633), 1600185599);
//        $this->assertEquals(TT::getCurrentMonthBegin(), 1672502400);
//        $this->assertEquals(TT::getCurrentMonthEnd(), 1675180799);
        $this->assertEquals(TT::formatToMonthBegin(1675180799), 1672502400);
        $this->assertEquals(TT::formatToMonthEnd(1675180791), 1675180799);
    }
    
}