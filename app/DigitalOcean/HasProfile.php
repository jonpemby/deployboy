<?php

namespace App\DigitalOcean;

/**
 * TODO:
 * 1) Needs to be renamed to be more semantic:
 *    - a user manages their profile through a DigitalOcean\ProfileManager
 *    - a user can manage **some** of their assets through this application (but not all)
 * 2) `digitalOceanProfile` breaks the 'two words or less' rule of naming
 */
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
        if (is_null($this->digitalOcean))
            $this->digitalOcean = resolve(ProfileManager::class)->setToken($this->digitalOceanToken);

        return $this->digitalOcean;
    }
}
