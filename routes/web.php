<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportantController;
use App\Http\Controllers\MyDayController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/myday', [MyDayController::class, 'index'])->name('myday');
Route::get('/myday/create', [MyDayController::class, 'create']);
Route::post('/myday', [MyDayController::class, 'store']);
Route::get('/myday/fav/{id}', [MyDayController::class, 'favourite']);
Route::get('/myday/done/{id}', [MyDayController::class, 'done']);

Route::get('/important', [ImportantController::class, 'index'])->name('important');
Route::get('/important/create', [ImportantController::class, 'create']);
Route::post('/important', [ImportantController::class, 'store']);
Route::get('/important/fav/{id}', [ImportantController::class, 'favourite']);
Route::get('/important/done/{id}', [ImportantController::class, 'done']);

Route::get('/task', [TaskController::class, 'index'])->name('task');
Route::get('/task/create', [TaskController::class, 'create']);
Route::post('/task', [TaskController::class, 'store']);
Route::get('/task/fav/{id}', [TaskController::class, 'favourite']);
Route::get('/task/done/{id}', [TaskController::class, 'done']);
