<?php

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

Route::get('/book-detail', function () {
    return view('user.book-detail');
});

Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/show-account-detail', function(){
    return view('auth.show-account-detail');
});

//show data list
Route::get('/redirect/admin-user-main', function(){
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

Route::get('/redirect/admin-subcategory-main', function(){
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

//edit data
Route::get('/redirect/admin-user-main/edit', function(){
    return view('admin.admin-edit');
});

Route::get('/redirect/admin-book-main/edit', function(){
    return view('admin.admin-edit');
});

Route::get('/redirect/admin-order-main/edit', function(){
    return view('admin.admin-edit');
});

Route::get('/redirect/admin-category-main/edit', function(){
    return view('admin.admin-edit');
});

Route::get('/redirect/admin-subcategory-main/edit', function(){
    return view('admin.admin-edit');
});

Route::get('/redirect/admin-publishing-company-main/edit', function(){
    return view('admin.admin-edit');
});

Route::get('/redirect/admin-author-main/edit', function(){
    return view('admin.admin-edit');
});