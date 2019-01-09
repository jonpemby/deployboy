<?php

namespace App\DigitalOcean\Behaviors;

use App\DigitalOcean\Contracts\Decorator;

/**
 * TODO:
 * 1) `digitalOceanProfile` breaks the 'two words or less' rule of naming
 */
trait ManagesDigitalOcean
{
    /**
     * Digital Ocean profile manager for a user's account.
     *
     * @var \App\DigitalOcean\ProfileManager
     */
    protected $digitalOcean = null;

    /**
     * Get the user's Digital Ocean token.
     *
     * @return \App\Token|null
     */
    public function getDigitalOceanTokenAttribute()
    {
        return $this->tokens()->digitalOcean()->firstOrFail();
    }

    /**
     * Get the Digital Ocean manager for a user's account.
     *
     * @return \App\DigitalOcean\Manager
     */
    public function getDigitalOceanProfileAttribute()
    {
        if (is_null($this->digitalOcean)) {
            $profile = resolve(Decorator::class);
            $profile->setToken($this->digitalOceanToken);
            $this->digitalOcean = $profile;
        }

        return $this->digitalOcean;
    }
}
