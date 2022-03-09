<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false, 'reset' => false]);
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [UserController::class, 'index'])->name('user.profile'); 
    Route::get('changepassword', [UserController::class, 'changepassword'])->name('user.changepassword');    
    Route::group(['prefix' => 'ideas'], function () {
    Route::get('/', [IdeaController::class,'index'])->name('ideas.index');
    });
    
    
    Route::group(['prefix' => 'admin','middleware' => 'role:admin'], function () {
        Route::get('/', [AdminController::class,'index'])->name('admin.index');
        Route::get('/register', [AdminController::class, 'create'])->name('register');
        Route::get('/listAccounts/index', [AdminController::class, 'list'])->name('admin.listAccounts.index');
        Route::get('/listAccounts/edit', [AdminController::class, 'edit'])->name('admin.listAccounts.edit');
        Route::get('/category/createCate',[AdminController::class,'createCategory']) -> name('admin.category.creatCate');
    });
});

