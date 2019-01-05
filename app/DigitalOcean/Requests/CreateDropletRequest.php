<?php

namespace App\DigitalOcean\Requests;

class CreateDropletRequest extends Request
{
    public function __construct($token, $data)
    {
        parent::__construct(
            'POST', 'droplets', $this->createRequestHeaders($token), $this->createRequestBody($data)
        );
    }
}
