<?php

namespace GaryBot\Middleware\Middleware;
use GaryBot\GaryBot;
use GaryBot\Messages\Incoming\IncomingMessage;

interface Received
{
    /**
     * Handle an incoming message.
     *
     * @param IncomingMessage $message
     * @param callable $next
     * @param GaryBot $bot
     *
     * @return mixed
     */
    public function received(IncomingMessage $message, $next, GaryBot $bot);
}
