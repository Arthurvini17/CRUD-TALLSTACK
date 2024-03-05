<?php

use App\Http\Controllers\UserController;
use App\Livewire\User\Update;
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
})->name('welcome');

Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

// Route::view('/create-user', 'user-create')->name('create.user');