<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewspostController;

require __DIR__.'/auth.php';

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', function () {
    return view('welcome');
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


});
