<?php
namespace Mantisbt\Result\Issue;

class ProjectTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $project = new Project($obj);
        $this->assertSame($obj->id, $project->getId());
        $this->assertSame($obj->name, $project->getName());
    }

    public function provider()
    {
        return [
            [null, null],
            [1, 'test'],
            [null, 'test'],
            [1, null],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testProvisionThroughKeyValue($id, $name)
    {
        $project = new Project($id, $name);
        $this->assertSame($id, $project->getId());
        $this->assertSame($name, $project->getName());
    }
}