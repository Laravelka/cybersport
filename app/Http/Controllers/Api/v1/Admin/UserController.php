<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::with('posts')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);
        $request_data['password'] = Hash::make($request_data['password']);

        if ($request->hasFile('avatar')) {
            $request_data['avatar'] = $request->avatar->store('avatars', 'public');
        }

        $user = User::create($request_data);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserResource(User::with('posts')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id() || Auth::user()->is_admin) {
            $request_data = array_diff($request->validated(), [null]);

            if (isset($request_data['password'])) {
                $request_data['password'] = Hash::make($request_data['password']);
            }

            if ($request->hasFile('avatar')) {
                $request_data['avatar'] = $request->avatar->store('avatars', 'public');

                $old_avatar_path = $user->avatar;
            }

            $user->update($request_data);

            if (isset($old_avatar_path)) {
                Storage::disk('public')->delete($old_avatar_path);
            }

            return new UserResource($user);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to edit user data"
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
        $user = User::findOrFail($id);

        if ($user->id === Auth::id() || Auth::user()->is_admin) {
            $avatar_path = $user->avatar;

            User::destroy($id);

            if (isset($avatar_path)) {
                Storage::disk('public')->delete($avatar_path);
            }

            return response(null, 204);
        } else {
            return response()->json([
                'message' => "You don't have anough rights to delete user"
            ], 403);
        }
    }
}
