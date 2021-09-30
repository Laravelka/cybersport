<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $request_data['user_id'] = Auth::id();

        if ($request->hasFile('img')) {
            $path = $request->img->store('posts', 'public');
            $request_data['img'] = $path;
        }

        $post = Post::create($request_data);

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
