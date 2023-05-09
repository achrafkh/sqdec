<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\BoardsController::class, 'board'])->name('home.boards');
Route::get('/board/{board_id?}', [App\Http\Controllers\BoardsController::class, 'board'])->name('home.boards');
Route::get('/admin/{board_id?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('boards', App\Http\Controllers\BoardsController::class);
Route::resource('tasks', App\Http\Controllers\TasksController::class);
Route::resource('{board_id}/widgets', App\Http\Controllers\WidgetsController::class, [
    'names' => [
        'index' => 'widgets.index',
        'store' => 'widgets.store',
    ]
]);
