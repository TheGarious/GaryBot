<?php

namespace GaryBot\Messages\Outgoing;

class OutgoingMessage
{
    protected $message;

    protected $attachment;

    public function __construct($message = null, $attachment = null)
    {
        $this->message = $message;
        $this->attachment = $attachment;
    }

    public static function create($message = null, $attachment = null)
    {
        return new self($message, $attachment);
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getAttachment()
    {
        return $this->attachment;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

}
