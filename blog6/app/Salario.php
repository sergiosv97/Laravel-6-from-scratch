<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $fillable = ['salario','fecha','title','cedula'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
