<?php

namespace GaryBot\tests\Messages\Attachments;

use GaryBot\Messages\Attachments\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    private $url       = "foo";

    public function testUrl()
    {
        $this->assertEquals($this->url, $this->create()->getUrl());
    }

    private function create()
    {
        return new Video($this->url);
    }
}
