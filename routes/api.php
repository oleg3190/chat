<?php

use App\Http\Controllers\Cabinet\AuthController;
use App\Http\Controllers\Cabinet\ChatController;
use App\Http\Controllers\Cabinet\MessageController;
use App\Http\Controllers\Cabinet\UserController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

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

Broadcast::routes(['middleware' => ['auth:sanctum']]);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
/*Route::post('/broadcasting/auth', function () {
    echo true;
});*/


Route::group([
    'middleware' => 'auth:sanctum',
], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('chats-id', [ChatController::class, 'getChatsId']);
    Route::apiResource('chat', ChatController::class);
    Route::apiResource('chat.message', MessageController::class);

    Route::apiResource('user', UserController::class);
    Route::post('/auth-user', [AuthController::class, 'getMe']);
});
