<?php

namespace App\DigitalOcean;

use App\DigitalOcean\Behaviors\ProxiesMethods;
use App\DigitalOcean\Contracts\Connector;
use App\DigitalOcean\Contracts\Decorator;

class ProfileConnector implements Decorator
{
    use ProxiesMethods;

    /**
     * @inheritDoc
     */
    public function __construct(Connector $next)
    {
        $this->next = $next;
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

