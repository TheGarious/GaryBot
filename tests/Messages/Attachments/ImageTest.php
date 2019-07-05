<?php

namespace GaryBot\tests\Messages\Attachments;


use GaryBot\Messages\Attachments\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testImage()
    {
        $image = new Image('foo');

        $image->addExtras('foo', [1,2,3]);
        $this->assertSame([1,2,3], $image->getExtras('foo'));

        $this->assertNull($image->getExtras("Unicorn"));
    }
}
