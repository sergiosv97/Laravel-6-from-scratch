<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['user_id','titulo','texto','imagen'];  


    public function user(){

        return $this->belongsTo(App::User);
    }
    


}
