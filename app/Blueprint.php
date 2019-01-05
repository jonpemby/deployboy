<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    /**
     * Relations to load on every query.
     *
     * @var array
     */
    protected $with = ['stack'];

    /**
     * A blueprint belongs to a stack.
     *
     * @return \Illuminate\Database\Eloquent\Relationships\BelongsTo
     */
     public function stack()
     {
         return $this->belongsTo(Stack::class);
     }

    /**
     * The name of the view file that contains the script for this blueprint.
     *
     * @return string
     */
    public function getScriptAttribute()
    {
        return 'scripts/' . kebab_case($this->stack->name) . '-' . str_replace('*', 'all', $this->role);
    }
}
