<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
*/

// contactページ
Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'check']);

// confirmページ
Route::get('/confirm', [ContactController::class, 'confirm']);
Route::post('/confirm', [ContactController::class, 'store']);
Route::post('/confirm/fix', [ContactController::class, 'fix'] );

// サンクスページ
Route::get('/thanks', [ContactController::class, 'thanks']);

//管理ページ
Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactController::class, 'admin']);
});
Route::get('/admin/download', [ContactController::class, 'download']);

//contact削除
Route::delete('/admin/delete', [ContactController::class, 'destroy']);
Route::get('/admin/search', [ContactController::class, 'search']);

// 登録ページ
Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);


