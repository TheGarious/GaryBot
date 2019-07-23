<?php

namespace GaryBot\Middleware\Middleware;
use GaryBot\GaryBot;
use GaryBot\Messages\Incoming\IncomingMessage;

interface Captured
{
    /**
     * Handle a captured message.
     *
     * @param IncomingMessage $message
     * @param callable $next
     * @param GaryBot $bot
     *
     * @return mixed
     */
    public function captured(IncomingMessage $message, $next, GaryBot $bot);
}
