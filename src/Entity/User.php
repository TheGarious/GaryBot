<?php

namespace GaryBot\Entity;

class User
{
    private $id;

    private $firstName;

    private $lastName;

    private $userName;

    private $userInfo;

    /**
     * User constructor.
     * @param null $id
     * @param null $firstName
     * @param null $lastName
     * @param null $userName
     * @param null $userInfo
     */
    public function __construct($id = null, $firstName = null, $lastName = null, $userName = null, $userInfo = [])
    {
        $this->id           = $id;
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->userInfo     = (array) $userInfo;
        $this->userName     = $userName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getUserInfo()
    {
        return $this->userInfo;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setUserInfo($userInfo)
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }
}
