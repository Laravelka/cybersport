<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatStoreRequest;
use App\Http\Requests\ChatUpdateRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ChatResource::collection(Chat::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChatStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        $chat = Chat::create($request_data);

        return new ChatResource($chat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ChatResource(Chat::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChatUpdateRequest $request, $id)
    {
        $chat = Chat::findOrFail($id);

        $request_data = array_diff($request->validated(), [null]);

        $chat->update($request_data);

        return new ChatResource($chat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);

        $chat->delete();

        return response(null, 204);
    }
}
