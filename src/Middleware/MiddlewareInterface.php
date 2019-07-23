<?php

namespace GaryBot\Middleware;

use GaryBot\Middleware\Middleware\Captured;
use GaryBot\Middleware\Middleware\Received;
use GaryBot\Middleware\Middleware\Matching;
use GaryBot\Middleware\Middleware\Heard;
use GaryBot\Middleware\Middleware\Sending;

interface MiddlewareInterface extends Captured, Received, Matching, Heard, Sending
{
    //
}
