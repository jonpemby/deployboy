<?php

namespace App\DigitalOcean;

use App\DigitalOcean\Requests\ListDropletsRequest;
use App\DigitalOcean\Requests\CreateDropletRequest;
use App\Blueprint;

class DropletsManager extends Manager
{
    /**
     * List a user's droplets with an optional tag parameter.
     *
     * @param int|null  $tag
     * @return GuzzleHttp\Promise\Promise
     */
    public function list($tag = null)
    {
        return $this->send(new ListDropletsRequest($this->token, $tag));
    }

    public function create(Blueprint $blueprint)
    {
        $cloud_init = view($blueprint->script, [
            'database_ext' => 'mysql',
            'app_name' => 'My Application',
            'app_domain' => 'app.co',
            'app_env' => 'production',
            'environment' => [
                'MYSQL_PASSWORD' => 'R12cB*fG90!c1',
            ],
        ])->render();

        return $this->send(new CreateDropletRequest($this->token, [
            'name' => 'my-application',
            'region' => 'nyc3',
            'size' => 's-1vcpu-1gb',
            'image' => 39342610,
            'backups' => false,
            'ipv6' => false,
            'private_networking' => false,
            'volumes' => null,
            'user_data' => $cloud_init,
            'ssh_keys' => [9551993],
        ]));
    }
}
