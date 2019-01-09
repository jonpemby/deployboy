<?php

namespace App\DigitalOcean\Decorators;

use Cache;

class CachedConnector extends Decorator
{
    /**
     * Cache the sent request.
     *
     * @return string
     */
    public function send()
    {
        $self = $this;

        $key = $this->generateKey();

        $minutes = config('digitalocean.cache.time');

        return Cache::remember($key, $minutes, function () use ($self) {
            return $self->next->send();
        });
    }
}
