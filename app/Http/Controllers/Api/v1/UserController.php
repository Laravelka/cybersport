<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(
            User::with(['comments', 'awards', 'likes'])->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UserResource
     */
    public function store(UserStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        $request_data['user_id'] = Auth::id();

        if ($request->hasFile('img')) {
            $path = $request->img->store('users', 'public');
            $request_data['img'] = $path;
        }

        $User = User::create($request_data);

        return new UserResource($User);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return UserResource
     */
    public function show(int $id)
    {
        $user = User::with(['friends', 'posts', 'comments', 'awards', 'likes'])->find($id);

        if ($user) {
            return new UserResource($user);
        } else {
            return response()->json([
                'message' => "Пользователь не найден!"
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, int $id)
    {
        $User = User::findOrFail($id);

        if ($User->id === Auth::id()) {
            $request_data = array_diff($request->validated(), [null]);

            if ($request->hasFile('avatar')) {
                $request_data['avatar'] = Storage::url($request->avatar->store('avatars', 'public'));

                $old_img_path = $User->avatar;
            }
            $User->update($request_data);

            if (isset($old_img_path)) {
                Storage::disk('public')->delete($old_img_path);
            }

            return new UserResource($User);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to edit User"
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
        $User = User::findOrFail($id);

        if ($User->user_id === Auth::id()) {
            $img_path = $User->img;

            User::destroy($id);

            if (isset($img_path)) {
                Storage::disk('public')->delete($img_path);
            }

            return response(null, 204);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to delete User"
            ], 403);
        }
    }
}
