<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('posts')->group(function() {
    Route::post('/', [PostController::class, 'store']);
    Route::get('/', [PostController::class, 'index']);
    Route::get('{id}', [PostController::class, 'show']);
});

Route::post('register', [AuthController::class, 'register']);

Route::prefix('tasks')->group(function() {
    Route::post('/', [TaskController::class, 'store']);
    Route::patch('{id}', [TaskController::class, 'update']);
    Route::get('pending', [TaskController::class, 'getPendingTasks']);
});
