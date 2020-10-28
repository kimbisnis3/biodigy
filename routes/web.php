<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('mainview');
});

Route::post('/v1/auth/login', [UserController::class, 'login']);
Route::post('/v1/auth/logout', [UserController::class, 'logout']);

Route::get('/v1/getuser', [UserController::class, 'getUser']);
Route::post('/v1/user', [UserController::class, 'createUser']);

Route::get('/v1/activities', [ActivityController::class, 'listActivity']);
Route::post('/v1/activity', [ActivityController::class, 'createActivity']);
Route::put('/v1/activity', [ActivityController::class, 'updateActivity']);
Route::delete('/v1/activity', [ActivityController::class, 'deleteActivity']);

Route::get('/v1/skills', [SkillController::class, 'listSkill']);
