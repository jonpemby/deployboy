<?php

namespace App\DigitalOcean\Contracts;

interface Decorator extends Connector
{
    /**
     * Decorates a `Connector` class.
     *
     * @constructor
     */
    public function __construct(Connector $next);
}
