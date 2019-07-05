<?php

namespace GaryBot\tests\Messages\Attachments;

use GaryBot\Messages\Attachments\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    private $latitude       = 46.3333;
    private $longitude      = 6.3833;

    public function testCreate()
    {
        $this->assertEquals($this->create(), Location::create($this->latitude, $this->longitude));
    }

    public function testLatitude()
    {
        $this->assertEquals($this->latitude, $this->create()->getLatitude());
    }

    public function testLongitude()
    {
        $this->assertEquals($this->longitude, $this->create()->getLongitude());
    }

    private function create()
    {
        return new Location($this->latitude, $this->longitude);
    }
}
