<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
});
// Route::get('login', function () {
//     return view('auth.login');
// });

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => 'LoginCheck'], function(){
Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/schedule/add', [ScheduleController::class, 'add']);
Route::post('/schedule', [ScheduleController::class, 'addProcess']);
Route::get('/schedule/edit/{id}', [ScheduleController::class, 'edit']);
Route::delete('/schedule/{id}', [ScheduleController::class, 'delete']);
Route::patch('/schedule/{id}', [ScheduleController::class, 'editProcess']);
Route::get('/logout', [AuthController::class, 'logout']);
});


