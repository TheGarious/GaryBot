<?php

namespace GaryBot\Middleware\Middleware;

use GaryBot\GaryBot;
use GaryBot\Messages\Incoming\IncomingMessage;

interface Heard
{
    /**
     * Handle a message that was successfully heard, but not processed yet.
     *
     * @param IncomingMessage $message
     * @param callable $next
     * @param GaryBot $bot
     *
     * @return mixed
     */
    public function heard(IncomingMessage $message, $next, GaryBot $bot);
}
