<?php

namespace GaryBot;


use GaryBot\Cache\CacheInterface;
use GaryBot\Commands\ConversationManager;
use GaryBot\Drivers\DriverInterface;
use GaryBot\Messages\Incoming\IncomingMessage;
use GaryBot\Messages\Matcher;
use GaryBot\Middleware\MiddlewareManager;
use GaryBot\Storages\StorageInterface;

/**
 * Class BotMan.
 */
class GaryBot
{

	/**
	 * BotMan constructor.
	 * @param CacheInterface $cache
	 * @param DriverInterface $driver
	 * @param array $config
	 * @param StorageInterface $storage
	 */
	public function __construct(CacheInterface $cache, DriverInterface $driver, $config, StorageInterface $storage)
	{
		$this->cache = $cache;
		$this->message = new IncomingMessage('', '', '');
		$this->driver = $driver;
		$this->config = $config;
		$this->storage = $storage;
		$this->matcher = new Matcher();
		$this->middleware = new MiddlewareManager($this);
		$this->conversationManager = new ConversationManager();
		//$this->exceptionHandler = new ExceptionHandler();
	}

}
