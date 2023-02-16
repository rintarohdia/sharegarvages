<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/test', [App\Http\Controllers\corp_controller::class, 'index']);

*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', App\Http\Controllers\UserController::class);
Route::resource('/corp', App\Http\Controllers\corp_controller::class);
Route::resource('/post', App\Http\Controllers\PostController::class);
Route::resource('/reply', App\Http\Controllers\ReplyController::class);

//会社変更機能
Route::get('/users/{id}/applyform', [App\Http\Controllers\CorpApplyController::class, 'apply_form']);
Route::post('/users/{id}/applyform', [App\Http\Controllers\CorpApplyController::class, 'accept_apply'])->name('users.applyform');
Route::get('/corp/{corp}/controlpanel', [App\Http\Controllers\CorpApplyController::class, 'controlpanel']);
Route::put('/corp/{id}/admit', [App\Http\Controllers\CorpApplyController::class, 'authorize_apply']);
Route::delete('/corp/{id}/admit', [App\Http\Controllers\CorpApplyController::class, 'reject_apply']);
Route::delete('/corp/{id}/releas', [App\Http\Controllers\CorpApplyController::class, 'releas']);