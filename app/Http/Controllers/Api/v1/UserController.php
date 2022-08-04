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
use Image;

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
			User::with(['comments', 'awards', 'posts', 'likes'])->get()
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return UserResource
	 *
	public function store(UserStoreRequest $request)
	{
		$request_data = array_diff($request->validated(), [null]);

		$request_data['user_id'] = Auth::id();

		if ($request->hasFile('avatar')) {
			$path = $request->img->store('users', 'public');

			$request_data['avatar'] = $path;
		}

		$User = User::create($request_data);

		return new UserResource($User);
	}
	*/

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
	 * @param  UserUpdateRequest  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserUpdateRequest $request, int $id)
	{
		$User = User::findOrFail($id);

		if ($User->id === Auth::id()) {
			$request_data = array_diff($request->validated(), [null]);

			if ($request->hasFile('avatar')) {
				$avatar = $request->file('avatar');
				$nameOriginal = $User->id.'_avatar_'.time().'.'.$avatar->getClientOriginalExtension();
				$fileOriginal = $avatar->storeAs('public', 'avatars/'.$nameOriginal);

				$imageInstance = Image::make($avatar->path());
				$destinationPath = public_path('storage/avatars');

				$resizedAvatar = $imageInstance->resize(100, 100, function ($constraint) {
					$constraint->aspectRatio();
				})->save($destinationPath.'/min_'.$nameOriginal);
				$fileResized = 'avatars/'.$resizedAvatar->basename;

				$request_data['avatar'] = $fileResized;
				$request_data['avatar_full'] = $fileOriginal;

				$oldAvatarPath = $User->avatar;
				$oldAvatarFullPath = $User->avatar_full;
			}
			$User->update($request_data);

			if (isset($oldAvatarPath) && isset($oldAvatarFullPath)) {
				Storage::disk('public')->delete($oldAvatarPath);
				Storage::disk('public')->delete(str_replace('public/', '', $oldAvatarFullPath));
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
		$user = User::findOrFail($id);

		if ($user->user_id === Auth::id()) {
			$avatar = $user->avatar;
			$avatarFull = $user->avatar_full;

			$user->delete();

			if (isset($img_path)) {
				Storage::disk('public')->delete($avatar);
				Storage::disk('public')->delete($avatarFull);
			}

			return response(null, 204);
		} else {
			return response()->json([
				'message' => "You don't have anough rights to delete User"
			], 403);
		}
	}
}
