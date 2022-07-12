<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FriendStoreRequest;
use App\Http\Requests\FriendUpdateRequest;
use App\Http\Resources\FriendResource;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FriendResource::collection(Friend::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FriendStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        $request_data['subscriber_id'] = Auth::id();

        if (!$this->hasSubscribe($request_data['user_id'], $request_data['subscriber_id'])) {
            $friend = Friend::create($request_data);

            return new FriendResource($friend);
        } else {
            return response()->json([
                'message' => "You already subscribed"
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new FriendResource(Friend::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FriendUpdateRequest $request, int $id)
    {
        $friend = Friend::findOrFail($id);

        $request_data = array_diff($request->validated(), [null]);

        $request_data['user_id'] = Auth::id();

        if ($request_data['user_id'] !== $friend->user_id) {
            return response()->json([
                'message' => "User's data doesn't match request's data"
            ], 422);
        }

        if (isset($request_data['is_friend']) && isset($request_data['is_subscriber'])) {
            $request_data['is_friend'] = 0;
            $request_data['is_subscriber'] = 1;
        }

        $friend->update($request_data);

        return new FriendResource($friend);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): \Illuminate\Http\Response
	{
        $friend = Friend::findOrFail($id);

        if ($friend->user_id === Auth::id()) {
            Friend::destroy($id);

            return response(null, 204);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to delete friend request"
            ], 403);
        }
    }

    public function hasSubscribe($user_id, $subscriber_id): bool
	{
        return (bool) Friend::where('user_id', $user_id)
			->where('subscriber_id', $subscriber_id)
			->first();
    }
}
