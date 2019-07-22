<?php

namespace GaryBot\Interfaces;

use GaryBot;

interface ExceptionHandlerInterface
{
    /**
     * Handle an exception.
     *
     * @param \Throwable $e
     * @param GaryBot $bot
     * @return mixed
     */
    public function handleException($e, GaryBot $bot);
    /**
     * Register a new exception type.
     *
     * @param string $exception
     * @param callable $closure
     * @return mixed
     */
    public function register(string $exception, callable $closure);
}
