<?php
namespace App\Repository\Chats;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Chats\ChatRepositoryInterface;
use App\Models\User;

class ChatRepository implements ChatRepositoryInterface
{
    public function create($id){

        $sender_name = Auth::user()->name;
        $receiver_name = User::where('id',$id)->value('name');
        $chat_id = Chat::where('receiver_name', $receiver_name)->where('sender_name',$sender_name)->first();

        // Check if chat already exists
        if ($chat_id) {

            $chat_messages = Message::where(function ($query) use ($sender_name,$receiver_name) {
            $query->where('sender_name', $sender_name)
                ->where('receiver_name', $receiver_name);
            })->orWhere(function ($query) use ($sender_name, $receiver_name) {
                $query->where('sender_name', $receiver_name)
                    ->where('receiver_name', $sender_name);
            })->get();

        return response([
            'status' => true,
            'message' => $chat_messages
        ]);

        } else {
            $chat = Chat::create([
                'sender_name' => $sender_name,
                'receiver_name' => $receiver_name,
                'last_seen' => null,
            ]);
            return response([
                'message' => 'chat created'
                ]);
        }
    }
}
