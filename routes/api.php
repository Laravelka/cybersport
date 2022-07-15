<?php

use App\Http\Controllers\Api\v1\Admin\ChatController;
use App\Http\Controllers\Api\v1\Admin\MatchController;
use App\Http\Controllers\Api\v1\Admin\SettingController;
use App\Http\Controllers\Api\v1\Admin\TeamController;
use App\Http\Controllers\Api\v1\Admin\UserController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ChatController as UsersChatController;
use App\Http\Controllers\Api\v1\UserController as ProfileController;
use App\Http\Controllers\Api\v1\CommentController;
use App\Http\Controllers\Api\v1\FriendController;
use App\Http\Controllers\Api\v1\LikeController;
use App\Http\Controllers\Api\v1\PostController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', [AuthController::class, 'register'])
	->name('register');
Route::post('/login', [AuthController::class, 'login'])
	->name('login');

Route::middleware(['auth:api'])->group(function() {
	Route::post('/logout', [AuthController::class, 'logout'])
		->name('logout');

	// users chat
	Route::get('/chat/{chatId}', [UsersChatController::class, 'getMessages'])
		->name('messages');
	Route::post('/chat/{chatId}/message', [UsersChatController::class, 'newMessage'])
		->name('message.store');

	Route::apiResources([
		'comments' => CommentController::class,
		'profiles' => ProfileController::class,
		'friends' => FriendController::class,
		'likes' => LikeController::class,
		'posts' => PostController::class,

	]);

	/*
	 * Admin routes
	 */
	Route::prefix('admin')
		->name('admin.')
		->middleware('admin')
		->group(function() {
			Route::apiResources([
				'chats' => ChatController::class,
				'matches' => MatchController::class,
				'settings' => SettingController::class,
				'teams' => TeamController::class,
				'users' => UserController::class,
			]);
		});

});
