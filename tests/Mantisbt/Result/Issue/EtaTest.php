<?php
namespace Mantisbt\Result\Issue;

class EtaTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $eta = new Eta($obj);
        $this->assertSame($obj->id, $eta->getId());
        $this->assertSame($obj->name, $eta->getName());
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
        $eta = new Eta($id, $name);
        $this->assertSame($id, $eta->getId());
        $this->assertSame($name, $eta->getName());
    }
}