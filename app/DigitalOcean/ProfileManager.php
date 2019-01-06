<?php

namespace App\DigitalOcean;

class ProfileManager extends Manager
{
    /**
     * Dynamically instantiate a manager matching a method call.
     * For instance, if the profile manager receives a call
     * to 'droplets' it returns a new 'DropletsManager'.
     *
     * @param string  $method
     * @param array  $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (method_exists($this, $method)) {
            return $this->{$method}(...$args);
        }

        $class_name = "\\App\\DigitalOcean\\" . studly_case($method) . 'Manager';

        if (class_exists($class_name)) {
            return new $class_name($this->client, $this->token, ...$args);
        }
    }
}
