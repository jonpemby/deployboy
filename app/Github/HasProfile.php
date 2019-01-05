<?php

namespace App\Github;

trait HasProfile
{
    /**
     * Profile object with GitHub profile information
     *
     * @var \App\Github\Profile
     */
    protected $github = null;

    /**
     * Get the GitHub profile of the user
     *
     * @return \App\Github\Profile
     */
    public function getGithubProfileAttribute()
    {
        if (is_null($this->github)) {
            $this->github = Profile::for($this->github_id);
        }

        return $this->github;
    }
}
