<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeStoreRequest;
use App\Http\Resources\LikeResource;
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
        $request_data = array_diff($request->validated(), [null]);

        $request_data['user_id'] = Auth::id();

            if (!$this->postHasLike($request_data['post_id'], $request_data['user_id'])) {
                $like = Like::create($request_data);

                return new LikeResource($like);
            } else {
                return response()->json([
                    'message' => "You already liked this post"
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

    public function postHasLike($post_id, $user_id)
    {
        return (
            Like::where('post_id', $post_id)
                ->where('user_id', $user_id)
                ->first()
        ) ? true : false;
    }
}
