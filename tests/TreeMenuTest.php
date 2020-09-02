<?php
namespace qwephp\tests;

use qwephp\TreeMenu;

class TreeMenuTest extends \Codeception\Test\Unit
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
        $treeMenu = TreeMenu::toTree([['id' => 1, 'name' => 'aaa', 'pid' => 0], ['id' => 2, 'name' => 'bbb', 'pid' => 1]]);
        codecept_debug($treeMenu);
        $actual = [1 => ['id' => 1, 'name' => 'aaa', 'pid' => 0, '_child' => [2 => ['id' => 2, 'name' => 'bbb', 'pid' => 1, '_child' => []]]]];
        codecept_debug($actual);
        $this->assertEquals($treeMenu, $actual);
        codecept_debug($actual);
        $breadcrumb = TreeMenu::toBreadcrumb($treeMenu);
        codecept_debug($breadcrumb);
        $this->assertEquals($breadcrumb, [1 => 'aaa', 2 => 'aaa > bbb']);
    }
}