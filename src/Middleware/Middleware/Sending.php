<?php

namespace GaryBot\Middleware\Middleware;

use GaryBot\GaryBot;

interface Sending
{
    /**
     * Handle an outgoing message payload before/after it
     * hits the message service.
     *
     * @param mixed $payload
     * @param callable $next
     * @param GaryBot $bot
     *
     * @return mixed
     */
    public function sending($payload, $next, GaryBot $bot);
}
