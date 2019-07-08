<?php

namespace GaryBot\Messages\Incoming;

use GaryBot\Messages\Attachments\Contact;
use GaryBot\Messages\Attachments\Location;

class IncomingMessage
{
    /** @var string */
    protected $message;

    /** @var string */
    protected $sender;

    /** @var string */
    protected $recipient;

    /** @var array */
    protected $images = [];

    /** @var array */
    protected $videos = [];

    /** @var mixed */
    protected $payload;

    /** @var array */
    protected $extras = [];

    /** @var array */
    private $audio = [];

    /** @var array */
    private $files = [];

    /** @var \GaryBot\Messages\Attachments\Location */
    private $location;

    /** @var \GaryBot\Messages\Attachments\Contact */
    private $contact;

    /** @var bool */
    protected $isFromBot = false;

    public function __construct($message, $sender, $recipient, $payload = null)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getConversationIdentifier()
    {
        return 'conversation-'.sha1($this->getSender()).'-'.sha1($this->getRecipient());
    }

    /**
     * We don't know the user, since conversations are originated on the channel.
     *
     * @return string
     */
    public function getOriginatedConversationIdentifier()
    {
        return 'conversation-'.sha1($this->getSender()).'-'.sha1('');
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return IncomingMessage
     */
    public function addExtras($key, $value)
    {
        $this->extras[$key] = $value;
        return $this;
    }

    /**
     * @param string|null $key
     * @return array
     */
    public function getExtras($key = null)
    {
        if (! is_null($key)) {
            //return Collection::make($this->extras)->get($key);
            return isset($this->extras[$key]) ? $this->extras[$key] : null;
        }
        return $this->extras;
    }
    /**
     * @param array $images
     */
    public function setImages(array $images)
    {
        $this->images = $images;
    }
    /**
     * Returns the message image Objects.
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }
    /**
     * @param array $videos
     */
    public function setVideos(array $videos)
    {
        $this->videos = $videos;
    }
    /**
     * Returns the message video Objects.
     * @return array
     */
    public function getVideos()
    {
        return $this->videos;
    }
    /**
     * @param array $audio
     */
    public function setAudio(array $audio)
    {
        $this->audio = $audio;
    }
    /**
     * Returns the message audio Objects.
     * @return array
     */
    public function getAudio()
    {
        return $this->audio;
    }
    /**
     * @param array $files
     */
    public function setFiles(array $files)
    {
        $this->files = $files;
    }
    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }
    /**
     * @param \GaryBot\Messages\Attachments\Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }
    /**
     * @return \GaryBot\Messages\Attachments\Location
     */
    public function getLocation() : Location
    {
        if (empty($this->location)) {
            throw new \UnexpectedValueException('This message does not contain a location');
        }
        return $this->location;
    }
    /**
     * @return \GaryBot\Messages\Attachments\Contact
     */
    public function getContact() : Contact
    {
        if (empty($this->contact)) {
            throw new \UnexpectedValueException('This message does not contain a contact');
        }
        return $this->contact;
    }
    /**
     * @param \GaryBot\Messages\Attachments\Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }
    /**
     * @return bool
     */
    public function isFromBot(): bool
    {
        return $this->isFromBot;
    }
    /**
     * @param bool $isFromBot
     */
    public function setIsFromBot(bool $isFromBot)
    {
        $this->isFromBot = $isFromBot;
    }
    /**
     * @param string $message
     */
    public function setText(string $message)
    {
        $this->message = $message;
    }
}
