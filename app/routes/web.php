<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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


/**
 * タスクダッシュボード表示
 */

Route::get('/', \App\Http\Controllers\Task\IndexController::class);

/**
 * 新タスク追加
 */
Route::post('/task', \App\Http\Controllers\Task\StoreController::class );

/**
 * タスク削除
 */
Route::delete('/task/{task}', \App\Http\Controllers\Task\DeleteController::class);
