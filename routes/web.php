<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::middleware('auth')->group(function (){
    Route::get('/user/{id}/machines/',['App\Http\Controllers\CommonController','index'])->name('common.home');
    Route::post('/logout', ['App\Http\Controllers\UserController', 'logout'])->name('logout');
    Route::get('/machine/{id}',['App\Http\Controllers\MachineController', 'show'])->name('machine.show');
    Route::get('/user/{id}/edit/account',['App\Http\Controllers\UserController','edit'])->name('user.edit');
    Route::get('/user/{id}/edit/requisites',['App\Http\Controllers\UserController','editRequisites'])->name('user.edit.requisites');
    Route::get('/feedback',['App\Http\Controllers\UserController','feedback'])->name('common.feedback');
    Route::post('/feedback',['App\Http\Controllers\UserController', 'sendFeedback'])->name('common.sendFeedback');
    Route::get('/attach',['App\Http\Controllers\MachineController', 'attach'])->name('machine.attach');
    Route::patch('/user/{id}/update/name',['App\Http\Controllers\UserController','changeUserName'])->name('changeUserName');
    Route::patch('/machine/{id}/update',['App\Http\Controllers\MachineController','update'])->name('machine.update');
    Route::middleware(AdminMiddleware::class)->group(function (){
        Route::get('/debug/user_name',['App\Http\Controllers\UserController','getName'])->name('getName');
        Route::get('/debug/feedback',['App\Http\Controllers\UserController','getFeedbackWithNames'])->name('getFeedback');
        Route::patch('/user/{id}/update/role',['App\Http\Controllers\UserController','changeRole'])->name('changeRole');
    });
    Route::patch('/user/{id}/update/email',['App\Http\Controllers\UserController','changeEmail'])->name('changeEmail');
    Route::patch('/user/{id}/update/fio',['App\Http\Controllers\UserController','changeFio'])->name('changeFio');
    Route::post('/user/{id}/requisites/create',['App\Http\Controllers\RequisitesController','create'])->name('requisites.create');
    Route::patch('/user/{id}/update/password',['App\Http\Controllers\UserController','changePassword'])->name('changePassword');
    Route::patch('/user/{id}/update/Tz',['App\Http\Controllers\UserController','changeTz'])->name('changeTz');
});

Route::get('/login',['App\Http\Controllers\UserController', 'login'])->name('login');
Route::post('/login/post',['App\Http\Controllers\UserController', 'loginPost'])->name('loginPost');
Route::get('/register',['App\Http\Controllers\UserController','showRegisterView'])->name('showRegisterView');
Route::post('/register/post',['App\Http\Controllers\UserController','registerPost'])->name('registerPost');
Route::get('/forgot-password',['App\Http\Controllers\UserController','forgotPassword'])->name('forgot-password');
Route::post('/forgot-password-post',['App\Http\Controllers\UserController','forgotPasswordPost'])->name('forgot-password-post');
