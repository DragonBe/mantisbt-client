<?php
namespace Mantisbt\Result;


class Member
{
    /**
     * @var int The member ID
     */
    protected $memberId;

    /**
     * @var string The member name
     */
    protected $name;

    /**
     * @var string The member real name
     */
    protected $realName;

    /**
     * @var string The member email address
     */
    protected $email;

    public function __construct($data = null)
    {
        if (null !== $data) {
            $this->populate($data);
        }
    }

    /**
     * @return int
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param int $memberId
     * @return Member
     */
    public function setMemberId($memberId)
    {
        $this->memberId = (int) $memberId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Member
     */
    public function setName($name)
    {
        $this->name = (string) $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     * @return Member
     */
    public function setRealName($realName)
    {
        $this->realName = (string) $realName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = (string) $email;
        return $this;
    }

    protected function populate($data)
    {
        $this->setMemberId($data->id)
            ->setName($data->name)
            ->setRealName($data->real_name)
            ->setEmail($data->email);
    }
}