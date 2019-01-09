<?php

namespace App\DigitalOcean\Behaviors;

trait ProxiesMethods
{
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
}
