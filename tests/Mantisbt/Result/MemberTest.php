<?php
namespace Mantisbt\Result;


class MemberTest extends \PHPUnit_Framework_TestCase
{
    public function testCanPopulateMember()
    {
        require_once __DIR__ . '/../__files/issue_fixture.php';
        $data = getMemberData();

        $member = new Member($data);
        $this->assertSame($data->id, $member->getMemberId());
        $this->assertSame($data->name, $member->getName());
        $this->assertSame($data->real_name, $member->getRealName());
        $this->assertSame($data->email, $member->getEmail());
    }
}