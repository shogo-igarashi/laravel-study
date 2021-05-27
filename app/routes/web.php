<?php

use App\Http\Controllers\MemberController;
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


//追記
Route::group(['prefix'=>'member'], function () {
    Route::get('index', [MemberController::class, 'index'])->name('member.index');
    Route::get('create', [MemberController::class, 'create'])->name('member.create');
    Route::post('store', [MemberController::class, 'store'])->name('member.store');

    Route::get('show/{id}', [MemberController::class, 'show'])->name('member.show');
});

/**
 * タスクダッシュボード表示
 */

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * 新タスク追加
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }


    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * タスク削除
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});
