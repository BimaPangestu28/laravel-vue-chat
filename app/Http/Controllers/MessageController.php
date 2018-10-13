<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;

use Response;
use Auth;

class MessageController extends Controller
{
    function index() {
        $messages   =   Message::with('user')->get();

        return Response::json($messages);
    }

    function store(Request $request) {
        $message = Message::create([
            "subject"   =>  $request->subject,
            "user_id"   =>  $request->id
        ]);
            
        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }
}
