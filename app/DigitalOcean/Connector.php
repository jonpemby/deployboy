<?php

namespace App\DigitalOcean;

use App\Token;
use App\DigitalOcean\Behaviors\BuildsRestParams;
use App\DigitalOcean\Contracts\Connector as ConnectorInterface;
use GuzzleHttp\Client;

final class Connector implements ConnectorInterface
{
    use BuildsRestParams;

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
     * @param \GuzzleHttp\Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Dynamically configures a request based on method calls.
     *
     * For instance `$this->droplets()->list()` will build a
     * request to list the user's droplets via the DO API.
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (preg_match($this->getResourcesRegex(), snake_case($method))) {
            return $this->setResource(snake_case($method));
        }

        if (method_exists($this, $method)) {
            return $this->{$method}(...$args);
        }

        throw new \BadMethodCallException("Method $method is not valid for " . __CLASS__);
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

    /**
     * Generates a key for requests made by a particular user.
     *
     * @return string
     */
    public function generateKey()
    {
        return 'do.' . $this->token->user->id . '.' . preg_replace('/\//', '.', $this->getUrl());
    }

    /**
     * Send the request.
     *
     * @return \GuzzleHttp\Ps7\Response
     */
    public function send()
    {
        return $this->client->request($this->getMethod(), $this->getUrl(), [
            'headers' => $this->getHeaders(),
            'body' => $this->getBody(),
        ])->getBody()->getContents();
    }
}
