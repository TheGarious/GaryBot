<?php

namespace GaryBot\Tests\Entity;

use GaryBot\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private     $id         = '42';
    private     $firstName  = 'Gary';
    private     $lastName   = 'Bot';
    private     $userName   = 'gary';
    private     $userInfo   = [
        'id' => '42',
        'name' => 'gary',
        'deleted' => false,
        'color' => '9f42e7',
        'profile' => [
            'avatar_hash' => 'ge3b42ca72de',
            'status_emoji' => ':mountain_railway:',
            'status_text' => 'riding in a fly',
            'first_name' => 'Gary',
            'last_name' => 'Bot',
            'real_name' => 'Gary Bot',
            'tz' => 'France\/Lyon',
            'tz_label' => 'Universal Time Coordinated',
            'tz_offset' => 0,
            'email' => 'gary@slack.com',
            'skype' => 'my-skype-name',
            'phone' => '+1 (123) 456 7890',
            'image_24' => 'https:\/\/...',
            'image_32' => 'https:\/\/...',
            'image_48' => 'https:\/\/...',
            'image_72' => 'https:\/\/...',
            'image_192' => 'https:\/\/...',
        ],
        'is_admin' => true,
        'is_owner' => true,
        'updated' => 1490054400,
        'has_2fa' => true,
    ];

    public function testId()
    {
        $user = $this->createUser();
        $this->assertEquals($this->id, $user->getId());
    }

    public function testFirstName()
    {
        $user = $this->createUser();
        $this->assertEquals($this->firstName, $user->getFirstName());
    }

    public function testLastName()
    {
        $user = $this->createUser();
        $this->assertEquals($this->lastName, $user->getLastName());
    }

    public function testUserName()
    {
        $user = $this->createUser();
        $this->assertEquals($this->userName, $user->getUserName());
    }

    public function testUserInfo()
    {
        $user = $this->createUser();
        $this->assertEquals($this->userInfo, $user->getUserInfo());
    }

    private function createUser()
    {
        return new User($this->id, $this->firstName, $this->lastName, $this->userName, $this->userInfo);
    }
}
