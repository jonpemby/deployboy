<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * A token belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relationships\BelongsTo
     */
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     /**
      * Get all tokens where the provider is Digital Ocean
      *
      * @param  \Illuminate\Database\Eloquent\Builder $builder
      * @return \Illuminate\Database\Eloquent\Builder
      */
     public function scopeDigitalOcean($builder)
     {
         return $builder->where('provider', 'digitalocean');
     }
}
