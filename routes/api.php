<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Previous route definition for 'tasks' using the 'get' method
// Route::get('tasks', [TaskController::class, 'index']);

// New route definition using 'apiResource' to handle 'tasks'
Route::apiResource('tasks', TaskController::class)->only([
    'index', 'show',
]);