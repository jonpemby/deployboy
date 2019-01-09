<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\DigitalOcean\Behaviors\ManagesDigitalOcean;
use App\Github\ManagesGithub;

class User extends Authenticatable
{
    use Notifiable, ManagesGithub, ManagesDigitalOcean;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user has many access tokens.
     *
     * @return \Illuminate\Database\Eloquent\Relationships\HasOneOrMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}
