<?php
namespace Mantisbt\Result\Issue;

class PriorityTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $priority = new Priority($obj);
        $this->assertSame($obj->id, $priority->getId());
        $this->assertSame($obj->name, $priority->getName());
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
        $priority = new Priority($id, $name);
        $this->assertSame($id, $priority->getId());
        $this->assertSame($name, $priority->getName());
    }
}