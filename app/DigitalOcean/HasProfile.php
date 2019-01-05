<?php

namespace App\DigitalOcean;

trait HasProfile
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
            $this->digitalOcean = ProfileManager::for($this);
        }

        return $this->digitalOcean;
    }
}
