<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/error/{code}', function(Request $request): Illuminate\Http\Response {
	return response()->view('errors.illustrated-layout', [
		'code' => $request->code ?? 404,
		'message' => $request->message ?? 'Неизвестная ошибка!',
		'image' => $request->image ?? '/images/decor/welcome-bg2.png'
	], $request->code ?? 404);
});

Route::get('/{driver}/redirect', [App\Http\Controllers\Auth\SocialAuthController::class, 'redirect']);
Route::get('/{driver}/callback', [App\Http\Controllers\Auth\SocialAuthController::class, 'callback']);

Route::get('/{any?}', [MainController::class, 'index'])->where('any', '.*');
