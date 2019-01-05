<?php

namespace App\DigitalOcean\Requests;

use App\Token;

class ListDropletsRequest extends Request
{
    /**
     * @constructor
     * @param \App\Token  $token
     * @param int|null  $tag
     */
    public function __construct($token, $tag = null)
    {
        $url = 'droplets';

        if (! is_null($tag)) {
            $url .= "?tag=$tag";
        }

        parent::__construct('GET', $url, $this->createRequestHeaders($token));
    }
}
