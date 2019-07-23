<?php

namespace GaryBot\Drivers;


use GaryBot\Collection\Collection;
use GaryBot\Http\HttpInterface;
use GaryBot\Messages\Incoming\IncomingMessage;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Classe de base pour les drivers
 */
abstract class HttpDriver implements DriverInterface
{
    /** @var Collection|ParameterBagInterface */
    protected $payload;

    /** @var Collection */
    protected $event;

    /** @var HttpInterface */
    protected $http;

    /** @var Collection */
    protected $config;

    /** @var string */
    protected $content;

    /**
     * Driver constructor.
     * @param Request $request
     * @param array $config
     * @param HttpInterface $http
     */
    final public function __construct(Request $request, array $config, HttpInterface $http)
    {
        $this->http = $http;
        $this->config = Collection::make($config);
        $this->content = $request->getContent();
        $this->buildPayload($request);
    }

    /**
     * Return the driver name.
     *
     * @return string
     */
    public function getName()
    {
        return static::DRIVER_NAME;
    }

    /**
     * Return the driver configuration.
     *
     * @return Collection
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Return the raw request content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param IncomingMessage $matchingMessage
     * @return void
     */
    public function types(IncomingMessage $matchingMessage)
    {
        // Do nothing
    }

    /**
     * @return bool
     */
    public function hasMatchingEvent()
    {
        return false;
    }

    /**
     * @param Request $request
     * @return void
     */
    abstract public function buildPayload(Request $request);

    /**
     * Low-level method to perform driver specific API requests.
     *
     * @param string $endpoint
     * @param array $parameters
     * @param IncomingMessage $matchingMessage
     * @return void
     */
    abstract public function sendRequest($endpoint, array $parameters, IncomingMessage $matchingMessage);

    /**
     * Tells if the stored conversation callbacks are serialized.
     *
     * @return bool
     */
    public function serializesCallbacks()
    {
        return true;
    }
}
