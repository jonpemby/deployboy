<?php

return [

    /**
     * Cache Settings
     * - - - - - - - - - - - - - - - - - - - - - - - - -
     * Controls whether the cache is enabled and for how long.
     */

    'cache' => [

        /**
         * Determines if the cache should be enabled for requests.
         *
         * @var bool
         */
        'on' => env('DIGITAL_OCEAN_CACHE_ENABLE', false),


        /**
         * Determines the amount of time to cache a request in minutes.
         *
         * @var int
         */
        'time' => env('DIGITAL_OCEAN_CACHE_MINUTES', 120),
    ],

    /**
     * Base URI for which to set up the client.
     *
     * @var string
     */
    'api_url' => 'https://api.digitalocean.com/v2/',
];

