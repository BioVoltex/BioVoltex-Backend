<?php

namespace App\Http\Controllers\API\Chat;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Notifications\NewMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Chats\ChatRepositoryInterface;

class ChatController extends Controller
{

    private $chatRepository;

    public function __construct(ChatRepositoryInterface $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    //start new chat method
    public function create($id)
    {
        return $this->chatRepository->create($id);
    }

    public function sendMessage(Request $request){
        $receiver_name = $request->receiver_name;
        $sender_name = Auth::user()->name;
        $chat = Chat::where('receiver_name', $receiver_name)->where('sender_name', $sender_name)->first();
        $message = Message::create([
            'chat_id' => $chat->id,
            'sender_name' => $sender_name,
            'receiver_name' => $receiver_name,
            'content' => $request->content,
            'status' => null,
        ]);

        // Retrieve message
        $message = Message::find($message->id);

        // Send the notification
        //$receiver_name->notify(new NewMessage($message->sender_name, $message->content));

        return response([
            'message' => $message
        ]);
    }



    //show all messages in the chat
    public function showMessages(){
        $user_name = Auth::user()->name;
        $chat_messages = Message::where(function ($query) use ($user_name) {
            $query->where('receiver_name', $user_name)
                ->orWhere('sender_name', $user_name);
        })->get();

        return response([
            'status' => true,
            'message' => $chat_messages
        ]);
    }


    //show all chats user have
    public function showChats(){
        $sender_name = Auth::user()->name;
        dd($sender_name);
        $chats = Chat::where('sender_name', $sender_name)->get();

        return response([
            'status' => true,
            'chats' => $chats
        ]);
        }

    //search for specific chat
    public function search(Request $request){
        $filter = $request->receiver_name;
        $chat = Chat::query()
            ->where('sender_name',Auth::user()->name)
            ->where('receiver_name', 'LIKE', "%{$filter}%")
            ->get();
        return response([
            'status' => true,
            'chat'=>$chat
        ]);
    }

}
