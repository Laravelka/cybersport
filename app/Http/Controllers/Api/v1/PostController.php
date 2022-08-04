<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Models\{Friend, User, Post};
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(
            Post::with(['comments', 'awards', 'likes'])->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        if ($request->hasFile('img')) {
            $path = $request->img->store('posts', 'public');
            $request_data['img'] = $path;
        }
        $post = $request->user()->posts()->create($request_data);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PostResource(Post::findOrFail($id));
    }
	
	/**
     * Display posts by friends.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
	 */
	public function getByFriends(Request $request)
	{
		$userId = $request->user_id ?? $request->user()->id;
		$friends = Friend::where('user_id', $userId)
			->orWhere('subscriber_id', $userId)
			->where('is_friend', true)
			->get();
		
		$arrFriendsId = [];
		foreach($friends as $key => $value) {
			if ($value->user_id == $userId) {
				$friend = $value->subscriber()->first();
			} else {
				$friend = $value->user()->first();
			}
			$arrFriendsId[] = $friend->id;
		}
		
		return PostResource::collection(
			Post::whereIn('user_id', $arrFriendsId)->get()
		);
	}
	
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id === Auth::id()) {
            $request_data = array_diff($request->validated(), [null]);

            if ($request->hasFile('img')) {
                $request_data['img'] = $request->img->store('posts', 'public');

                $old_img_path = $post->img;
            }

            $post->update($request_data);

            if (isset($old_img_path)) {
                Storage::disk('public')->delete($old_img_path);
            }

            return new PostResource($post);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to edit post"
            ], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id === Auth::id()) {
            $img_path = $post->img;

            Post::destroy($id);

            if (isset($img_path)) {
                Storage::disk('public')->delete($img_path);
            }

            return response(null, 204);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to delete post"
            ], 403);
        }
    }
}
