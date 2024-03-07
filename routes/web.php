<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'everyControll'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/task/create', [TaskController::class,'create'])->name('task.create');
    Route::patch('/task/create', [TaskController::class,'save'])->name('task.save');
    Route::get('/task/show/{task_id}', [TaskController::class,'show'])->name('task.show');
    Route::get('/task/edit/{task_id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/task/update/{task_id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task/delete/{task_id}', [TaskController::class, 'delete'])->name('task.delete');
    Route::get('/tasks/filter-search', [DashboardController::class, 'everyControll'])->name('task.filter-search');

});

Route::middleware('auth')->group(function () {
    Route::get('/chat/send/{task_id}', [ChatController::class,'send'])->name('chat.send');
});

Route::get('/demo', [TaskController::class,'demo']);


require __DIR__.'/auth.php';
