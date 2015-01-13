<?php
namespace Mantisbt\Result\Issue;

class ProjectionTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $projection = new Projection($obj);
        $this->assertSame($obj->id, $projection->getId());
        $this->assertSame($obj->name, $projection->getName());
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
        $projection = new Projection($id, $name);
        $this->assertSame($id, $projection->getId());
        $this->assertSame($name, $projection->getName());
    }
}