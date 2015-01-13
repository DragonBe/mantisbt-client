<?php
namespace Mantisbt\Result\Issue;

class ResolutionTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $resolution = new Resolution($obj);
        $this->assertSame($obj->id, $resolution->getId());
        $this->assertSame($obj->name, $resolution->getName());
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
        $resolution = new Resolution($id, $name);
        $this->assertSame($id, $resolution->getId());
        $this->assertSame($name, $resolution->getName());
    }
}