<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/redirect/book-detail', function () {
    return view('user.book-detail');
});

Route::get('/redirect/cart', function () {
    return view('user.cart');
});

Route::get('/show-account-detail', function(){
    return view('auth.show-account-detail');
});

//show data list
Route::get('/redirect/admin-user-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-shipping-information-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-book-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-order-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-category-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-publishing-company-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-author-main', function(){
    return view('admin.admin-list');
});

Route::get('/redirect/admin-review-and-rating-main', function(){
    return view('admin.admin-list');
});

//edit data list
Route::get('/redirect/admin-user-main/edit', function(){
    return view('admin.editFunction.admin-edit-user');
});

Route::get('/redirect/admin-shipping-information-main/edit', function(){
    return view('admin.editFunction.admin-edit-shipping-information');
});

Route::get('/redirect/admin-book-main/edit', function(){
    return view('admin.editFunction.admin-edit-book');
});

Route::get('/redirect/admin-order-main/edit', function(){
    return view('admin.editFunction.admin-edit-order');
});

Route::get('/redirect/admin-category-main/edit', function(){
    return view('admin.editFunction.admin-edit-category');
});

Route::get('/redirect/admin-publishing-company-main/edit', function(){
    return view('admin.editFunction.admin-edit-publishing-company');
});

Route::get('/redirect/admin-author-main/edit', function(){
    return view('admin.editFunction.admin-edit-author');
});

Route::get('/redirect/admin-review-and-rating-main/edit', function(){
    return view('admin.editFunction.admin-edit-review-and-rating');
});

//Add data
Route::get('/redirect/admin-user-main/add', function(){
    return view('admin.addFunction.admin-add-user');
});

Route::post('/admin-add-user', [AdminController::class, 'addUser']);

Route::get('/redirect/admin-shipping-information-main/add', function(){
    return view('admin.addFunction.admin-add-shipping-information');
});

Route::get('/redirect/admin-book-main/add', function(){
    return view('admin.addFunction.admin-add-book');
});

Route::get('/redirect/admin-order-main/add', function(){
    return view('admin.addFunction.admin-add-order');
});

Route::get('/redirect/admin-category-main/add', function(){
    return view('admin.addFunction.admin-add-category');
});

Route::get('/redirect/admin-publishing-company-main/add', function(){
    return view('admin.addFunction.admin-add-publishing-company');
});

Route::get('/redirect/admin-author-main/add', function(){
    return view('admin.addFunction.admin-add-author');
});

Route::get('/redirect/admin-review-and-rating-main/add', function(){
    return view('admin.addFunction.admin-add-review-and-rating');
});