<?php

namespace Mantisbt\Client;


class Account
{
    /**
     * @var string The username to log into MantisBT
     */
    protected $username;
    /**
     * @var string The password to log into MantisBT
     */
    protected $password;

    public function __construct($username = null, $password = null)
    {
        if (null !== $username) {
            $this->setUsername($username);
        }
        if (null !== $password) {
            $this->setPassword($password);
        }
    }
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Account
     */
    public function setUsername($username)
    {
        $this->username = (string) $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = (string) $password;
        return $this;
    }

}