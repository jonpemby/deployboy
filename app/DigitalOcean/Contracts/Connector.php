<?php

namespace App\DigitalOcean\Contracts;

interface Connector
{
    /**
     * Sends the request to the Digital Ocean API.
     *
     * @return string
     */
    public function send();

    /**
     * Generate a key for the request.
     *
     * @return string
     */
    public function generateKey();
}
