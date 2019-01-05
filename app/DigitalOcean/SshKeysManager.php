<?php

namespace App\DigitalOcean;

use App\DigitalOcean\Requests\ListSshKeysRequest;

class SshKeysManager extends Manager
{
    /**
     * List the user's SSH keys.
     *
     * @return \GuzzleHttp\Promise\Promise
     */
    public function list()
    {
        return $this->send(new ListSshKeysRequest($this->token));
    }
}
