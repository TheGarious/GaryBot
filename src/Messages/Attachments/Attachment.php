<?php

namespace GaryBot\Messages\Attachments;


abstract class Attachment
{
    /** @var mixed */
    protected $payload;

    /** @var array */
    protected $extras = [];

    /**
     * Attachment constructor.
     * @param mixed $payload
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return Attachment
     */
    public function addExtras($key, $value)
    {
        $this->extras[$key] = $value;
        return $this;
    }

    /**
     * @param string|null $key
     * @return array
     * // TODO Review
     */
    public function getExtras($key = null)
    {
        if (! is_null($key)) {
            // return Collection::make($this->extras)->get($key);

            return isset($this->extras[$key]) ? $this->extras[$key] : null;
        }
        return $this->extras;
    }
}
