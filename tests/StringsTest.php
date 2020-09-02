<?php 
class StringsTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testTrim()
    {
        $this->assertEquals(\qwenode\qwephp\Strings::trim('a '),'a');
        $this->assertEquals(\qwenode\qwephp\Strings::trim("a \n\r\t"),'a');
    }
}