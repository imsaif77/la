<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StepController;
use App\Http\Controllers\API\UserController;

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

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);
Route::resource('steps', StepController::class);

Route::resource('users', UserController::class)->middleware('verified');

Route::get('users/{email}',[UserController::class, 'getEmail']);
Route::post('usersemail',[UserController::class, 'getUserByEmail']);



// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('steps', StepController::class);
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
