<?php
namespace Mantisbt\Result\Issue;

class StateTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $state = new State($obj);
        $this->assertSame($obj->id, $state->getId());
        $this->assertSame($obj->name, $state->getName());
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
        $state = new State($id, $name);
        $this->assertSame($id, $state->getId());
        $this->assertSame($name, $state->getName());
    }
}