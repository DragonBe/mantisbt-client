<?php

namespace Mantisbt\Client;


use Mantisbt\Client;

class AccountTest extends \PHPUnit_Framework_TestCase
{
    public function goodAccountProvider()
    {
        return array (
            array (null, null),
            array ('test', null),
            array (null, 'test'),
            array ('', ''),
            array ('test', ''),
            array ('', 'test'),
            array ('test', 'test'),
        );
    }

    /**
     * @dataProvider goodAccountProvider
     */
    public function testAccountCanBeProvisioned($username, $password)
    {
        $account = new Account($username, $password);
        $this->assertSame($username, $account->getUsername());
        $this->assertSame($password, $account->getPassword());
    }
}