<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ability;
use App\Role;
class Role extends Model
{
    protected $guarded = [];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();;
    }

    public function allowTo($ability)
    {
        if (is_string($ability)){
            $ability = Ability::whereName($ability)->firstOrFail();
        }

        $this->abilities()->sync($ability,false);
    }
}
