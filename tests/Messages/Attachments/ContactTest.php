<?php

namespace GaryBot\tests\Messages\Attachments;


use GaryBot\Messages\Attachments\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    private $phoneNumber    = "0123456789";
    private $firstName      = "John";
    private $lastName       = "Doe";
    private $userId         = 42;
    private $vCard          = "42654446";


    public function testCreate()
    {
        $this->assertEquals($this->create(), Contact::create($this->phoneNumber, $this->firstName, $this->lastName, $this->userId, $this->vCard));
    }

    private function create()
    {
        return new Contact($this->phoneNumber, $this->firstName, $this->lastName, $this->userId, $this->vCard);
    }
}
