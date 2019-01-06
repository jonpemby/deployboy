<?php

namespace App\DigitalOcean;

use App\Token;
use App\User;
use App\DigitalOcean\Requests\Request;
use GuzzleHttp\Client;

abstract class Manager
{
    /**
     * A user or team's Digital Ocean access token.
     *
     * @var \App\Token
     */
    protected $token;

    /**
     * Guzzle client for sending requests.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @constructor
     * @param \App\Token  $token
     * @param \GuzzleHttp\Client  $client
     */
    public function __construct(Client $client, $token = null)
    {
        $this->client = $client;

        $this->token = $token;
    }

    /**
     * Sends the request to the Digital Ocean API.
     *
     * @return \GuzzleHttp\Promise\Promise
     */
    public function send(Request $request)
    {
        return $this->client->sendAsync($request);
    }

    /**
     * Set the authentication token used for requests.
     *
     * @param \App\Token  $token
     * @return $this
     */
    public function setToken(Token $token)
    {
        $this->token = $token;

        return $this;
    }
}
