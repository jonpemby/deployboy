<?php

namespace App\DigitalOcean\Requests;

class ListSshKeysRequest extends Request
{
    public function __construct($token)
    {
        parent::__construct('GET', 'account/keys', $this->createRequestHeaders($token));
    }
}
