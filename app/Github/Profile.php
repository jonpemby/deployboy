<?php

namespace App\Github;

use Redis;

class Profile
{
    /**
     * Data of a Github profile.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Given the user's data create a new \App\Github\Profile.
     *
     * @param array  $data
     * @constructor
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the user's GitHub profile.
     *
     * @return \App\Github\Profile
     */
    public static function for($id)
    {
        return new static(
            json_decode(Redis::hget('github_profiles', $id) ?? new \stdClass)
        );
    }

    /**
     * Get a prop from data.
     *
     * @param mixed  $prop
     * @return mixed
     */
    public function __get($prop)
    {
        return $this->data->{$prop};
    }

    /**
     * Set a property value.
     *
     * @param mixed  $prop
     * @param mixed  $value
     */
    public function __set($prop, $value)
    {
        $this->data->{$prop} = $value;
    }

    /**
     * Fluent-style setter for properties.
     *
     * @param mixed  $prop
     * @param mixed  $value
     */
    public function set($prop, $value)
    {
        $this->{$prop} = $value;

        return $this;
    }

    /**
     * Save the user's profile data when the ref to this object is destroyed.
     *
     * @destructor
     */
    public function __destruct()
    {
        Redis::hset('github_profiles', $this->id, $this->data);
    }
}
