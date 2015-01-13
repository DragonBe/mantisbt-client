<?php
namespace Mantisbt\Result\Issue;

class StatusTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $status = new Status($obj);
        $this->assertSame($obj->id, $status->getId());
        $this->assertSame($obj->name, $status->getName());
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
        $status = new Status($id, $name);
        $this->assertSame($id, $status->getId());
        $this->assertSame($name, $status->getName());
    }
}