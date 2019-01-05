<?php

namespace App\Service;

abstract class ServerRole
{
    /**
     * Defines a server that handles incoming user traffic
     *
     * @var string
     */
    const FRONTEND = 'frontend';

    /**
     * Defines a server that handles database requests
     *
     * @var string
     */
    const DATABASE = 'database';

    /**
     * Defines a server that handles Redis requests
     *
     * @var string
     */
    const REDIS = 'redis';

    /**
     * Defines a server that handles jobs on a queue
     *
     * @var string
     */
    const WORKER = 'worker';

    /**
     * Defines a server that handles all requests.
     * Typically an 'all-in-one' application.
     *
     * @var string
     */
    const ALL = '*';
}
