<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\ChatMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageStoreRequest;
use App\Http\Resources\ChatMessageResource;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getMessages($chatId)
    {
        $messages = Message::where('chat_id', $chatId)->get();

        return ChatMessageResource::collection($messages);
    }

    public function newMessage(MessageStoreRequest $request, $chatId)
    {
        $requestData = array_diff($request->validated(), [null]);

        $requestData['user_id'] = Auth::id();

        $chat = Chat::findOrFail($chatId);

        $newMessage = $chat->messages()->create($requestData);

        ChatMessage::dispatch($newMessage);

        return new ChatMessageResource($newMessage);
    }
}
