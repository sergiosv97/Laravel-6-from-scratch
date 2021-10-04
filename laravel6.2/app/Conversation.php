<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //protected $fillable = ['title','body'];

    public function setBestReply(Reply $reply)
    {
        $this->best_reply_id = $reply_id;
        $this->save();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
