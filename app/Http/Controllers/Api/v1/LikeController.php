<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeStoreRequest;
use App\Http\Resources\{
    LikeResource,
    PostResource
};
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
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
    public function store(LikeStoreRequest $request)
    {
        $user = $request->user();
        $like = $user->likes()->where('post_id', $request->post_id);

        if ($like->exists()) {
            $post = $like->first()->post()->first();

            $like->delete();

            return new PostResource($post);
        } else {
            $like = $user->likes()->create([
                'post_id' => $request->post_id
            ]);
            $post = $like->post()->first();
            
            return new PostResource($post);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //todo like removing
    }
}
