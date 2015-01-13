<?php
namespace Mantisbt\Result\Issue;

class ReproducibilityTest extends \PHPUnit_Framework_TestCase
{
    public function testProvisionThroughObject()
    {
        $obj = new \stdClass();
        $obj->id = 1;
        $obj->name = 'test';

        $reproducibility = new Reproducibility($obj);
        $this->assertSame($obj->id, $reproducibility->getId());
        $this->assertSame($obj->name, $reproducibility->getName());
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
        $reproducibility = new Reproducibility($id, $name);
        $this->assertSame($id, $reproducibility->getId());
        $this->assertSame($name, $reproducibility->getName());
    }
}