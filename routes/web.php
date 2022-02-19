<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost']);

Route::any('/account', function (){
    return 'Действие недоступно, необходимо авторизоваться';
})->name('account');

Route::any('/create', function (){
    return 'Действие недоступно, необходимо авторизоваться';
})->name('account');

Route::middleware('auth')->group(function (){
    Route::get('/account', [UserController::class, 'account'])->name('account');
    Route::get('/account/delete/{id}', [ApplicationController::class, 'delete'])->name('delete');
    Route::prefix('application')->group(function (){
        Route::get('/add', [ApplicationController::class, 'create'])->name('create');
        Route::post('/add', [ApplicationController::class, 'createApplication']);
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('role:1')->group(function (){
        Route::get('/admin', [AdminController::class, 'account'])->name('admin');

        Route::get('/categories', [AdminController::class, 'editCategory'])->name('editCategory');
        Route::post('/categories', [AdminController::class, 'editCategoryPost'])->name('editCategoryPost');
        Route::delete('/categories/destroy/{category}', [AdminController::class, 'destroy'])->name('destroyCategory');

        Route::get('/update/{id}', [AdminController::class, 'changeStatus'])->name('changeStatus');
        Route::post('/update/status/{id}', [AdminController::class, 'changeStatusPost'])->name('changeStatusPost');
    });


});
