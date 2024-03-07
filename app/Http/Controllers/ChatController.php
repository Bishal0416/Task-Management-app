<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function send(request $req, $task_id){
        $validated = $req->validate([
            'chat' => 'required',
        ]);
        $current_user_name = auth()->user()->name;
        $current_user_id = auth()->user()->id;
        // dd($current_user);
        // dd($req->input('chat'));
        $chat = new Chat();
        $chat->message=$req->input('chat');
        $chat->user_name=$current_user_name;
        $chat->user_id=$current_user_id;
        $chat->task_id=$task_id;
        // dd($chat);
        $chat->save();
        return redirect('task/show/'.$task_id);
    }
}
