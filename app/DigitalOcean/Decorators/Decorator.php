<?php

namespace App\DigitalOcean\Decorators;

use App\DigitalOcean\Contracts\Decorator as DecoratorInterface;
use App\DigitalOcean\Contracts\Connector;

abstract class Decorator implements DecoratorInterface
{
    /**
     * @inheritDoc
     */
    public function __construct(Connector $next)
    {
        $this->next = $next;
    }

    /**
     * Passes methods to the `next` proxy.
     *
     * @param string  $method
     * @param array  $args
     * @return $this
     */
    public function __call($method, $args)
    {
        $this->next->{$method}(...$args);

        return $this;
    }

    /**
     * Sends the request to the Digital Ocean API.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function send()
    {
        return $this->next->send();
    }

    /**
     * @inheritDoc
     */
    public function generateKey()
    {
        return $this->next->generateKey();
    }
}
