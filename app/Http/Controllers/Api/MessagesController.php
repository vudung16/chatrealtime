<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Events\MessagePosted;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Messages;

class MessagesController extends Controller
{
    public function addMessage() {
        $user = JWTAuth::user();
        $data = [
            'conversation_id' => 1,
            'sender_id' => 5,
            'message_type' => 'text',
            'message' => 'Vũ Mạnh Dũng',
        ];

        $message = Messages::create($data);
        broadcast(new MessagePosted($message, $user))->toOthers();
    }
}
