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
    public function __construct(Token $token, Client $client)
    {
        $this->token = $token;

        $this->client = $client;
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
     * Get a manager for a specific user.
     *
     * @param \App\User  $user
     * @return \App\DigitalOcean\Manager
     */
    public static function for(User $user)
    {
        return new static($user->digitalOceanToken, new Client([
            'base_uri' => 'https://api.digitalocean.com/v2/',
        ]));
    }
}
