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
        Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
        Route::post('/store', [IdeaController::class, 'store'])->name('ideas.store');
    });
    
    Route::group(['prefix' => 'admin','middleware' => 'role:admin'], function () {
        Route::get('/', [AdminController::class,'index'])->name('admin.index');
        Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/register', [AdminController::class, 'createAccount'])->name('admin.listAccount.register');
        Route::get('/listAccounts/index', [AdminController::class, 'listAccount'])->name('admin.listAccounts.index');
        Route::get('/listAccounts/edit', [AdminController::class, 'edit'])->name('admin.listAccounts.edit');
        Route::get('/accounts/list', [AdminController::class, 'listAccount'])->name('admin.accounts.list');
        // Category
        Route::get('/category/createCate',[AdminController::class,'createCategory']) -> name('admin.category.creatCate');
        Route::post('/category/createCate',[AdminController::class,'storeCategory']) -> name('admin.category.createCate');
        Route::get('/category/index', [AdminController::class, 'indexCategory']) -> name('admin.category.index');
        Route::post('/category/index', [AdminController::class, 'storeCategory']) -> name('admin.category.index');
        // Route::get('/category/showCate/{id}',[AdminController::class,'showCategory']) -> name('admin.category.showCate');
        Route::get('/category/update/{id}', [AdminController::class, 'editCategory']) -> name('admin.category.update');
        Route::post('/category/update/{id}', [AdminController::class, 'updateCategory']) -> name('admin.category.update');
        Route::delete('/category/delete/{id}', [AdminController::class, 'deleteCategory']) -> name('admin.category.delete');
        
        //Department
        Route::get('/department/createDepart',[AdminController::class,'createDepartment']) -> name('admin.department.createDepart');
        Route::post('/department/createDepart',[AdminController::class,'storeDepartment']) -> name('admin.department.createDepart');
        Route::get('/department/index', [AdminController::class, 'indexDepartment']) -> name('admin.department.index');
        Route::post('/department/index', [AdminController::class, 'storeDepartment']) -> name('admin.department.index');
        Route::put('/department/index', [AdminController::class, 'updateDepartment']) -> name('admin.department.index');
        // Route::get('/department/showDepart/{id}',[AdminController::class,'showDepartment']) -> name('admin.department.showDepart');
        Route::get('/department/update/{id}', [AdminController::class, 'editDepartment']) -> name('admin.department.update');
        Route::put('/department/update/{id}', [AdminController::class, 'updateDepartment']) -> name('admin.department.update');
        // Route::resource('/update','AdminController');
        Route::delete('/department/delete/{id}', [AdminController::class, 'deleteDepartment']) -> name('admin.department.delete');
    
        //Mission

    });
});
