<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermOfUseController;
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

Auth::routes(['register' => false, 'reset' => false, 'logout' => false]);
Route::get('/login', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/privacy', [PrivacyController::class,'index'])->name('privacy');
Route::get('/term', [TermOfUseController::class,'index'])->name('term');
    
Route::post('/contact', [ContactController::class, 'index'])->name('contact');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('profile', [UserController::class, 'uploadAvatar'])->name('user.uploadAvatar');
    //Route for showing changing password form
    Route::get('change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
    //Route for changing password
    Route::get('update-password', [UserController::class, 'updatePassword']);
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    //Route for modifying phone number
    Route::get('change-phone-number', [UserController::class, 'changePhoneNumber']);
    Route::post('change-phone-number', [UserController::class, 'changePhoneNumber'])->name('user.changePhoneNumber');

    Route::group(['prefix' => 'ideas'], function () {
        Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
        Route::post('store', [IdeaController::class, 'store'])->name('ideas.store');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::group(['prefix' => 'account'], function () {
            Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
            Route::get('/dt-row-data', [AccountController::class, 'getDtRowData']);
            Route::delete('/delete/{id}', [AccountController::class, 'delete'])->name('admin.account.delete');
            Route::post('/create', [AccountController::class, 'create'])->name('admin.account.create');
            Route::get('/update/{id}', [AccountController::class, 'edit'])->name('admin.account.update');
            Route::post('/update/{id}', [AccountController::class, 'update'])->name('admin.account.store');
        });

        // Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'indexCategory'])->name('admin.category.index');
            Route::get('/dt-row-data', [CategoryController::class, 'getDtRowData']);
            Route::post('/create', [CategoryController::class, 'create'])->name('admin.category.createCate');
            Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
            Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.update');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.store');
        });

        //Department
        Route::get('/department/', [DepartmentController::class, 'indexDepartment'])->name('admin.department.index');
        Route::get('/department/dt-row-data', [DepartmentController::class, 'getDtRowData']);
        Route::post('/department/createDpm', [DepartmentController::class, 'create'])->name('admin.department.createDpm');
        Route::delete('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('admin.department.delete');
        Route::get('department/update/{id}', [DepartmentController::class, 'edit'])->name('admin.department.update');
        Route::post('department/update/{id}', [DepartmentController::class, 'update'])->name('admin.department.store');

        //Semester
        Route::get('/semester/', [SemesterController::class, 'indexSemester'])->name('admin.semester.indexSemester');
        Route::get('/semester/dt-row-data', [SemesterController::class, 'getDtRowData']);
        Route::post('/semester/createSmt', [SemesterController::class, 'create'])->name('admin.semester.createSmt');
        Route::delete('/semester/delete/{id}', [SemesterController::class, 'delete'])->name('admin.semester.delete');
        Route::get('semester/update/{id}', [SemesterController::class, 'edit'])->name('admin.semester.update');
        Route::post('semester/update/{id}', [SemesterController::class, 'update'])->name('admin.semester.store');

        //Mission
        Route::get('/missions/', [MissionController::class, 'index'])->name('admin.missions.indexMission');
        Route::get('/missions/dt-row-data', [MissionController::class, 'getDtRowData']);
        Route::post('/mission/create', [MissionController::class, 'create'])->name('admin.mission.create');
        Route::get('/missions/category/{id}', [MissionController::class, 'listMissionByCategory'])->name('admin.missions.category.index');
        Route::get('/missions/category/{id}/dt-row-data', [MissionController::class, 'getDtRowDataByCategory']);
    });

    
});
