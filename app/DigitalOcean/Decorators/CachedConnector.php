<?php

namespace App\DigitalOcean\Decorators;

use App\DigitalOcean\Contracts\Connector;
use App\DigitalOcean\Contracts\Decorator;
use App\DigitalOcean\Behaviors\ProxiesMethods;
use Cache;

class CachedConnector implements Decorator
{
    use ProxiesMethods;

    /**
     * Takes a reference to an instance of `Connector`.
     * @constructor
     */
    public function __construct(Connector $next)
    {
        $this->next = $next;
    }

    /**
     * Cache the sent request.
     *
     * @return string
     */
    public function send()
    {
        $self = $this;

        $key = $this->generateKey();

        $minutes = config('digitalocean.cache_time');

        return Cache::remember($key, $minutes, function () use ($self) {
            return $self->next->send();
        });
    }

    /**
     * Generates a unique key for the request.
     *
     * @return string
     */
    public function generateKey()
    {
        return $this->next->generateKey();
    }
}
