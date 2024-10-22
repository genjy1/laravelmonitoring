<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    Route::get('/',['App\Http\Controllers\CommonController','index'])->name('common.home');
    Route::post('/logout', ['App\Http\Controllers\UserController', 'logout'])->name('logout');
    Route::get('/machine/{id}',['App\Http\Controllers\MachineController', 'show'])->name('machine.show');
    Route::get('/user/{user_name}/edit/account',['App\Http\Controllers\UserController','edit'])->name('user.edit');
    Route::get('/user/{user_name}/edit/requisites',['App\Http\Controllers\UserController','editRequisites'])->name('user.edit.requisites');
    Route::get('/feedback',['App\Http\Controllers\UserController','feedback'])->name('common.feedback');
    Route::post('/feedback',['App\Http\Controllers\UserController', 'sendFeedback'])->name('common.sendFeedback');
    Route::get('/attach',['App\Http\Controllers\MachineController', 'attach'])->name('machine.attach');
    Route::patch('/user/{id}/update/name',['App\Http\Controllers\UserController','changeUserName'])->name('changeUserName');
});

Route::get('/login',['App\Http\Controllers\UserController', 'login'])->name('login');
Route::post('/login',['App\Http\Controllers\UserController', 'loginPost'])->name('loginPost');
Route::get('/register',['App\Http\Controllers\UserController','showRegisterView'])->name('showRegisterView');

Route::post('/register/post',['App\Http\Controllers\UserController','registerPost'])->name('registerPost');
