<?php
namespace qwephp\tests;
class DateTimesTest extends \Codeception\Test\Unit
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
        $this->assertEquals(\qwephp\DateTimes::getBeginOfTheDayByUnix(1600165627),1600099200);
        $this->assertEquals(\qwephp\DateTimes::getEndOfTheDayByUnix(1600165633),1600185599);
    }
}