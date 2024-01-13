<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
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
Route::get('/', [ContactController::class, 'contact']);
Route::post('/', [ContactController::class, 'store']);

// confirmページ
Route::get('/confirm', [ContactController::class, 'confirm']);

// サンクスページ
Route::get('/thanks', [ContactController::class, 'thanks']);

//管理画面
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
});

