<?php
namespace Mantisbt\Result\Issue;

class SeverityTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $severity = new Severity($obj);
        $this->assertSame($obj->id, $severity->getId());
        $this->assertSame($obj->name, $severity->getName());
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
        $severity = new Severity($id, $name);
        $this->assertSame($id, $severity->getId());
        $this->assertSame($name, $severity->getName());
    }
}