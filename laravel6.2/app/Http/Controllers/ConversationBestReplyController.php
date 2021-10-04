<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        $this->authorize('update',$reply->conversation);

        $reply->conversation->setBestReply($reply);

        return back();
    }
}
