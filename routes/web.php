<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewspostController;
use App\Http\Controllers\Admin\photoGalleryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\User\UserController;

require __DIR__.'/auth.php';

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', function () {
    return view('frontend/frontend');
});

Route::middleware(['auth', 'role:admin'])->group(function() {

    // permission user or admin
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin#dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin#logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin#profile');

    //active or inactive
    Route::get('admin/active/{id}', [AdminController::class, 'adminActive'])->name('admin#active');
    Route::get('admin/inactive/{id}', [AdminController::class, 'adminInactive'])->name('admin#inactive');


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

    // categories
    Route::get('allcategories', [CategoryController::class, 'index'])->name('all#categories');
    Route::post('store/categories', [CategoryController::class, 'storeCategory'])->name("store#category");
    Route::post('delete/category/{id}', [CategoryController::class, 'destroy'])->name("delete#category");
    Route::post('update/category/{id}', [CategoryController::class, 'updateCategory'])->name("update#category");
    // Route::get('/category/{id}', [CategoryController::class, 'getCategory']);

    // subcategories
    Route::get('subcategory/list', [CategoryController::class, 'subcategoryList'])->name("subcategory#list");
    Route::post('store/subcategory', [CategoryController::class, 'storeSubcategory'])->name("store#subcategory");
    Route::post('update/subcategory/{id}', [CategoryController::class, 'updateSubcategory'])->name("update#subcategory");

    Route::post('delete/subcategory/{id}', [CategoryController::class, 'destroySubcategory'])->name("delete#subcategory");
    Route::get('/subcategory/ajax/{category_id}',[CategoryController::class], 'GetSubCategory');

    //news post
    Route::get('newspost/list', [NewspostController::class, 'newspostList'])->name("newspost#list");
    Route::get('newspost/add', [NewspostController::class, 'newspostAdd'])->name("newspost#add");
    Route::post('newspost/store', [NewspostController::class, 'newspostStore'])->name("admin#news#store");
    Route::get('newspost/edit/{id}', [NewspostController::class, 'newspostEdit'])->name('newspost#edit');
    Route::post('newspost/update', [NewspostController::class, 'newspostUpdate'])->name('newspost#update');
    Route::get('newspost/delete/{id}', [NewspostController::class, 'newspostDelete'])->name('newspost#delete');
    Route::get('newspost/inactive/{id}', [NewspostController::class, 'newspostInactive'])->name('newspost#inactive');
    Route::get('newspost/active/{id}', [NewspostController::class, 'newspostActive'])->name('newspost#active');

    //banner
    Route::get('banners/list', [BannerController::class, 'bannerlist'])->name('banners#list');
    Route::post('banners/update', [BannerController::class, 'bannerUpdate'])->name('banner#update');

    //photo gallery
    Route::get('gallery/list', [photoGalleryController::class, 'gallerylist'])->name('gallery#list');
    Route::get('gallery/add', [photoGalleryController::class, 'galleryAdd'])->name('gallery#add');
    Route::post('gallery/save', [photoGalleryController::class, 'gallerySave'])->name('gallery#save');
    Route::get('gallery/edit/{id}', [photoGalleryController::class, 'galleryEdit'])->name('gallery#edit');
    Route::post('gallery/update', [photoGalleryController::class, 'galleryUpdate'])->name('gallery#update');
    Route::post('gallery/delete/{id}', [photoGalleryController::class, 'galleryDelete'])->name('gallery#delete');

    //video gallery
    Route::get('video/gallery/list', [VideoGalleryController::class, 'videoGalleryList'])->name('video#gallery#list');
    Route::get('video/gallery/add', [VideoGalleryController::class, 'videoGalleryAdd'])->name('video#gallery#add');
    Route::post('video/gallery/save', [VideoGalleryController::class, 'videoGallerySave'])->name('video#gallery#save');
    Route::get('video/gallery/edit/{id}', [VideoGalleryController::class, 'videoGalleryEdit'])->name('video#gallery#edit');
    Route::post('video/gallery/update', [VideoGalleryController::class, 'videoGalleryUpdate'])->name('video#gallery#update');
    Route::post('video/gallery/delete/{id}', [VideoGalleryController::class, 'videoGalleryDelete'])->name('video#gallery#delete');

    // live tv
    Route::get('live/tiv/update/page', [VideoGalleryController::class, 'liveTvUpdatePage'])->name("live#tv#update#page");
    Route::post('live/tiv/update', [VideoGalleryController::class, 'liveTvUpdate'])->name("live#tv#update");

    // review system
    Route::get('review/system', [ReviewController::class, 'reviewSytem'])->name('review#system');
    Route::get('review/inactive/{id}', [ReviewController::class, 'reviewInactive'])->name('review#inactive');
    Route::get('review/active/{id}', [ReviewController::class, 'reviewActive'])->name('review#active');
    Route::get('review/delete/{id}', [ReviewController::class, 'reviewDelete'])->name('review#delete');

    // permission only
    Route::get('permission/all', [RoleController::class, 'permissionAll'])->name("permission#all");
    Route::get('permission/add', [RoleController::class, 'permissionAdd'])->name("permission#add");
    Route::post('permission/store', [RoleController::class, 'permissionStore'])->name("permission#store");
    Route::get('permission/delete/{id}', [RoleController::class, 'permissionDelete'])->name("permission#delete");
    Route::get('permission/edit/{id}', [RoleController::class, 'permissionEdit'])->name("permission#edit");
    Route::post('permission/update', [RoleController::class, 'permissionUpdate'])->name("permission#update");


    //role only
    Route::get('role/list', [RoleController::class, 'roleList'])->name("role#list");
    Route::get('role/add', [RoleController::class, 'roleAdd'])->name("role#add");
    Route::post('role/store', [RoleController::class, 'roleStore'])->name("role#store");
    Route::get('role/edit/{id}', [RoleController::class, 'roleEdit'])->name("role#edit");
    Route::post('role/update', [RoleController::class, 'roleUpdate'])->name("role#update");
    Route::get('role/delete/{id}', [RoleController::class, 'roleDelete'])->name("role#delete");

    // Both role and permission
    Route::get('permission/role/all', [RoleController::class, 'permissionRoleAll'])->name("permission#role#all");
    Route::get('permission/role/add', [RoleController::class, 'permissionRoleAdd'])->name("permission#role#add");
    Route::post('permission/role/store', [RoleController::class, 'permissionRoleStore'])->name("role#permission#store");
    Route::get('permission/role/edit/{id}', [RoleController::class, 'permissionRoleEdit'])->name("permission#role#edit");
    Route::post('permission/role/update/{id}', [RoleController::class, 'permissionRoleUpdate'])->name("role#permission#update");
    Route::get('permission/role/delete/{id}', [RoleController::class, 'permissionRoleDelete'])->name("permission#role#delete");

});


// for user
Route::middleware(['auth', 'role:user'])->group(function() {

    // permission user or admin
    Route::get('/user/frontend/dashboard', [UserController::class, 'UserFrontendDashboard'])->name('user#frontend#dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user#profile#store');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user#change#password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user#update#password');

    //review
    Route::post('reviews/store', [ReviewController::class, 'reviewsStore'])->name("reviews#store");

});

//normal user or no account user
Route::get('newspost/details/{id}/{slug}', [NewspostController::class, 'newspostDetails'])->name('newspost#details');
Route::get('newspost/category/{id}/{slug}', [NewspostController::class, 'newspostCategory'])->name('newspost#category');
Route::get('newspost/subcategory/{id}/{slug}', [NewspostController::class, 'newspostSubcategory'])->name('newspost#subcategory');
Route::post('news/search', [NewspostController::class, 'newsSearch'])->name('news#search');
Route::get('news/reporter/profile/{id}', [NewspostController::class, 'newsReporterProfile'])->name('news#reporter#profile');
Route::get('news/policy', [NewspostController::class, 'newsPolicy'])->name('news#policy');
Route::get('lang/change', [NewspostController::class, 'change'])->name('changeLang');
