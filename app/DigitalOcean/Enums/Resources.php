<?php

namespace App\DigitalOcean\Enums;

abstract class Resources
{
    /**
     * Represents the resources currently configured.
     *
     * @var array
     */
    const RESOURCES = [
        'droplets', 'account', 'domains', 'floating_ips', 'firewalls', 'images',
        'load_balancers', 'projects', 'regions', 'sizes', 'snapshots', 'tags',
    ];
}
