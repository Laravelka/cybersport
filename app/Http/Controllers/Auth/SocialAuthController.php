<?php

namespace App\Http\Controllers\Auth;


use SocialiteProviders\Steam\OpenIDValidationException;
use \Laravel\Socialite\Two\InvalidStateException;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use \InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class SocialAuthController extends Controller
{
	public function redirect(Request $request, $driver)
	{
		try {
			return Socialite::driver($driver)->redirect();
		} catch (InvalidArgumentException|ClientException $exception) {
			return response()->view('errors.illustrated-layout', [
				'code' => '404',
				'message' => 'Указанная соц. сеть не найдена',
				'image' => '/images/decor/welcome-bg2.png'
			], 404);
		}
	}

	public function callback(Request $request, $driver)
	{
		try {
			switch ($driver) {
				case 'steam':
					$user = Socialite::driver($driver)->user();

					$id = $user->id;
					$avatar = $user->user['avatarfull'];
					$nickname = $user->nickname;
					$ipAddress = $_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']);

					$checkIfExists = User::with(['friends', 'posts', 'comments', 'awards', 'likes'])
						->where('steam_id', $id)
						->first();

					if ($checkIfExists) {
						$newUser = $checkIfExists;
					} else {
						$newUser = User::create([
							'name' => $nickname,
							'avatar' => $avatar,
							'steam_id' => $id,
							'ip_address' => $ipAddress,
							'remember_token' => Str::random(10),
						]);
					}
					$token = $newUser->createToken('access token')->accessToken;

					$response = [
						'arrUser' => new UserResource($newUser->refresh()),
						'accessToken' => $token
					];

					return view('index', $response);

					break;
				case 'yandex':
					$user = Socialite::driver($driver)->user();

					$id 	    = $user->id;
					$email	    = $user->email;
					$avatar     = 'https://avatars.yandex.net/get-yapic/'.$user->user['default_avatar_id'].'/islands-75';
					$avatarFull = $user->avatar;
					$nickname   = $user->nickname;
					$firstName  = explode(' ', $user->name)[0];
					$lastName   = explode(' ', $user->name)[1];
					$ipAddress  = $_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']);

					$checkIfExists = User::with(['friends', 'posts', 'comments', 'awards', 'likes'])
						->where('email', $email)
						->orWhere('yandex_id', $id)
						->first();

					if ($checkIfExists) {
						$checkIfExists->update([
							'avatar' => $avatar,
							'avatar_full' => $avatarFull
						]);
						$newUser = $checkIfExists;
					} else {
						$newUser = User::create([
							'email' => $email,
							'name' => $nickname,
							'avatar' => $avatar,
							'avatar_full' => $avatarFull,
							'yandex_id' => $id,
							'last_name' => $lastName,
							'first_name' => $firstName,
							'ip_address' => $ipAddress,
							'remember_token' => Str::random(10),
						]);
					}
					$token = $newUser->createToken('access token')->accessToken;

					$response = [
						'arrUser' => new UserResource($newUser->refresh()),
						'accessToken' => $token
					];

					return view('index', $response);

					break;
				case 'vkontakte':
					$user = Socialite::driver($driver)->fields([
						'photo_max',
						'photo_100'
					])->user();

					$id 	    = $user->id;
					$email	    = $user->email;
					$avatar	    = $user->user['photo_100'];
					$avatarFull = $user->user['photo_max'];
					$nickname   = $user->nickname;
					$firstName  = $user->user['first_name'];
					$lastName   = $user->user['last_name'];
					$ipAddress  = $_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']);

					$checkIfExists = User::with(['friends', 'posts', 'comments', 'awards', 'likes'])
						->where('email', $email)
						->orWhere('vk_id', $id)
						->first();

					if ($checkIfExists) {
						$checkIfExists->update([
							'avatar' => $avatar,
							'avatar_full' => $avatarFull
						]);
						$newUser = $checkIfExists;
					} else {
						$newUser = User::create([
							'email' => $email,
							'name' => $nickname,
							'avatar' => $avatar,
							'avatar_full' => $avatarFull,
							'vk_id' => $id,
							'last_name' => $lastName,
							'first_name' => $firstName,
							'ip_address' => $ipAddress,
							'remember_token' => Str::random(10),
						]);
					}
					$token = $newUser->createToken('access token')->accessToken;

					return view('index', [
						'arrUser' => new UserResource($newUser->refresh()),
						'accessToken' => $token
					]);
			}
		} catch (InvalidArgumentException $exception) {
			return response()->view('errors.illustrated-layout', [
				'code' => '404',
				'message' => 'Указанная соц. сеть не найдена',
				'image' => '/images/decor/welcome-bg2.png'
			], 404);
		} catch (InvalidStateException|OpenIDValidationException|ClientException $exception) {
			return response()->view('errors.illustrated-layout', [
				'code' => '404',
				'message' => 'Время жизни токена истекло',
				'image' => '/images/decor/welcome-bg2.png'
			], 404);
		}
	}
}
