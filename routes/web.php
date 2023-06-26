<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewspostController;
use App\Http\Controllers\User\UserController;

require __DIR__.'/auth.php';

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', function () {
    // return view('welcome');
    return view('frontend/frontend');
});

// Route::get('/dashboard', function () {
//     return view('/');
// })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

Route::middleware(['auth', 'role:admin'])->group(function() {

    // permission user or admin
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin#dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin#logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin#profile');

    // categories
    Route::get('allcategories', [CategoryController::class, 'index'])->name('all#categories');
    Route::post('store/categories', [CategoryController::class, 'storeCategory'])->name("store#category");
    Route::post('delete/category/{id}', [CategoryController::class, 'destroy'])->name("delete#category");

    Route::get('/category/{id}', [CategoryController::class, 'getCategory']);
    Route::post('update/category/{id}', [CategoryController::class, 'updateCategory'])->name("update#category");

    // subcategories
    Route::get('subcategory/list', [CategoryController::class, 'subcategoryList'])->name("subcategory#list");
    Route::post('store/subcategory', [CategoryController::class, 'storeSubcategory'])->name("store#subcategory");
    Route::post('update/subcategory/{id}', [CategoryController::class, 'updateSubcategory'])->name("update#subcategory");

    Route::post('delete/subcategory/{id}', [CategoryController::class, 'destroySubcategory'])->name("delete#subcategory");


    //news post
    Route::get('newspost/list', [NewspostController::class, 'newspostList'])->name("newspost#list");

    //manage role and news post settings
    Route::get('admin/list', [AdminController::class, 'adminList'])->name("admin#list");
    Route::post('admin/profile/store', [AdminController::class, 'adminProfileStore'])->name("admin#profile#store");
    Route::get('admin/change/password', [AdminController::class, 'adminChangePassword'])->name("admin#change#password");
    Route::post('admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name("admin#update#password");

    Route::get('admin/add', [AdminController::class, 'adminAdd'])->name("admin#add");
    Route::post('admin/store', [AdminController::class, 'adminStore'])->name("admin#store");
    Route::get('admin/edit/{id}', [AdminController::class, 'adminEdit'])->name("admin#edit");
    Route::post('admin/update', [AdminController::class, 'adminUpdate'])->name("admin#update");
    Route::get("admin/delete/{id}", [AdminController::class, 'adminDelete'])->name("admin#delete");

});



Route::middleware(['auth', 'role:user'])->group(function() {

    // permission user or admin
    Route::get('/user/frontend/dashboard', [UserController::class, 'UserFrontendDashboard'])->name('user#frontend#dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user#profile#store');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user#change#password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user#update#password');

});
