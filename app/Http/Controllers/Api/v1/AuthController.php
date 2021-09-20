<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);
        $request_data['password'] = Hash::make($request_data['password']);
        $request_data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $request_data['remember_token'] = Str::random(10);

        $user = User::create($request_data);

        $token = $user->createToken('access token')->accessToken;

        $response = [
            'user' => new UserResource($user),
            'access_token' => $token
        ];

        return response()->json($response);
    }

    public function login(Request $request)
    {
    }

    public function logout()
    {
    }
}
