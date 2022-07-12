<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse
	{
        $request_data = array_diff($request->validated(), [null]);
        $request_data['password'] = Hash::make($request_data['password']);
        $request_data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $request_data['remember_token'] = Str::random(10);

        $user = User::with(['friends', 'posts', 'comments', 'awards', 'likes'])->create($request_data);
        $token = $user->createToken('access token')->accessToken;

        $response = [
            'user' => new UserResource($user->refresh()),
            'access_token' => $token
        ];

        return response()->json($response);
    }

    public function login(UserLoginRequest $request): JsonResponse
	{
        $request_data = array_diff($request->validated(), [null]);
        $search_param = array_key_exists('email', $request_data) ? 'email' : 'phone';

        $user = User::with(['friends', 'posts', 'comments', 'awards', 'likes'])->where($search_param, $request_data[$search_param])->first();

        if ($user) {
            if (Hash::check($request_data['password'], $user->password)) {
                $token = $user->createToken('access token')->accessToken;

                $response = [
                    'user' => new UserResource($user),
                    'access_token' => $token
                ];

                return response()->json($response);
            } else {
                return response()->json([
                    'message' => 'Введен неверный пароль'
                ], 422);
            }
        } else {
            return response()->json([
                'message' => 'Пользователь с указанным email или номером телефона отсутствует'
            ], 422);
        }
    }

    public function logout(Request $request): JsonResponse
	{
        $token = $request->user()->token();
        $token->revoke();

        return response()->json([
            'message' => 'You have been logged out'
        ]);
    }
}
