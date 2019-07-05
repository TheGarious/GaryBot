<?php

namespace GaryBot\tests\Messages\Attachments;


use GaryBot\Messages\Attachments\File;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    private $url = "foo";


    public function testFile()
    {
        $file = new File($this->url);

        $this->assertEquals($this->url, $file->getUrl());
    }
}
