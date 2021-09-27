<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        $request_data['user_id'] = Auth::id();

        if ($request->hasFile('img')) {
            $path = $request->img->store('comments', 'public');
            $request_data['img'] = $path;
        }

        $comment = Comment::create($request_data);

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CommentResource(Comment::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdateRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id === Auth::id()) {
            $request_data = array_diff($request->validated(), [null]);

            if ($request->hasFile('img')) {
                $path = $request->img->store('comments', 'public');
                $request_data['img'] = $path;

                $old_img_path = $comment->img;
            }

            $comment->update($request_data);

            if (isset($old_img_path)) {
                Storage::disk('public')->delete($old_img_path);
            }

            return new CommentResource($comment);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to edit comment"
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
        $comment = Comment::findOrFail($id);

        if ($comment->user_id === Auth::id()) {
            $img_path = $comment->img;

            Comment::destroy($id);

            if (isset($img_path)) {
                Storage::disk('public')->delete($img_path);
            }

            return response(null, 204);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to delete comment"
            ], 403);
        }
    }
}
