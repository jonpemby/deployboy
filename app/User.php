<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * A user has many todos.
     *
     * @return \Illuminate\Database\Eloquent\Relationships\HasOneOrMany
     */
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
