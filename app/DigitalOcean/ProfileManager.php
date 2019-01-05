<?php

namespace App\DigitalOcean;

class ProfileManager extends Manager
{
    /**
     * Provides access to the user's droplets manager.
     *
     * @return \App\DigitalOcean\DropletsManager
     */
    public function droplets()
    {
        return new DropletsManager($this->token, $this->client);
    }

    /**
     * Provides access to the user's SSH keys manager.
     *
     * @return \App\DigitalOcean\SshKeysManager
     */
    public function ssh()
    {
        return new SshKeysManager($this->token, $this->client);
    }
}
