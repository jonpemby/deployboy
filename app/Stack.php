<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    /**
     * A stack has many blueprints.
     *
     * @return \Illuminate\Database\Eloquent\Relationships\HasOneOrMany
     */
    public function blueprints()
    {
        return $this->hasMany(Blueprint::class);
    }
}
