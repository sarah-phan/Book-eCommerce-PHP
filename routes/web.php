<?php

use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPublishingInformationController;
use App\Http\Controllers\AdminShippingController;
use App\Http\Controllers\AdminSubcategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserController;
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
Route::get('/book-detail/{book_id}', [BookController::class, 'getBookbyIdForUser']);
Route::post('/add-to-cart/{book_id}', [CartController::class, 'addCart']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['admin']], function () {
    //show data list
    Route::get('/admin-book-main', [BookController::class, 'showBookList']);
    Route::get('/admin-user-main', [UserController::class, 'showUserList']);
    Route::get('/admin-shipping-information-main', [AdminShippingController::class, 'showShippingList']);
    Route::get('/admin-order-main', [AdminOrderController::class, 'showOrderList']);
    Route::get('/admin-subcategory-main', [AdminSubcategoryController::class, 'showSubcategoryList']);
    Route::get('/admin-category-main', [AdminCategoryController::class, 'showCategoryList']);
    Route::get('/admin-publishing-company-main', [AdminPublishingInformationController::class, 'showPublishingCompanyList']);
    Route::get('/admin-author-main', [AdminAuthorController::class, 'showAuthorList']);

    //edit data list
    Route::get('/admin-user-main/{user_id}/edit', [UserController::class, 'getUserWithIdInfor']);
    Route::post('/admin-user-edit/{user_id}', [UserController::class, 'updateUserWithIdInfor']);


    Route::get('/admin-shipping-information-main/edit', [AdminShippingController::class, 'getShippingWithIdInfor']);
    Route::post('/admin-shipping-information-edit/{shipping_id}', [UserController::class, 'updateShippingWithIdInfor']);


    Route::get('/admin-book-main/{book_id}/edit', [BookController::class, 'getBookWithId']);
    Route::post('/admin-book-edit/{book_id}', [BookController::class, 'updateBookWithId']);


    Route::get('/admin-order-main/detail/{order_id}', [AdminOrderController::class, 'getOrderById']);
    Route::get("/admin-order-main/detail/edit/{order_id}", [AdminOrderController::class, 'getOrderStatus']);
    Route::post("/admin-order-edit/{order_id}", [AdminOrderController::class, 'updateOrderStatus']);


    Route::get('/admin-category-main/{category_id}/edit', [AdminCategoryController::class, 'getCategoryWithIdInfor']);
    Route::post('/admin-category-edit/{category_id}', [AdminCategoryController::class, 'updateCategoryWithIdInfor']);


    Route::get('/admin-subcategory-main/{subcategory_id}/edit', [AdminSubcategoryController::class, 'getSubCategoryWithIdInfor']);
    Route::post('/admin-subcategory-edit/{subcategory_id}', [AdminSubcategoryController::class, 'updateSubcategoryWithIdInfor']);


    Route::get('/admin-publishing-company-main/{company_id}/edit', [AdminPublishingInformationController::class, 'getPublishingCompanyWithIdInfor']);
    Route::post('/admin-publishing-company-edit/{company_id}', [AdminPublishingInformationController::class, 'updatePublishingCompanyWithIdInfor']);


    Route::get('/admin-author-main/{author_id}/edit', [AdminAuthorController::class, 'getAuthorWithIdInfor']);
    Route::post('/admin-author-edit/{author_id}', [AdminAuthorController::class, 'updateAuthorWithIdInfor']);

    //Add data
    Route::get('/admin-user-main/add', function () {
        return view('admin.addFunction.admin-add-user');
    });
    Route::post('/admin-add-user', [UserController::class, 'addUser']);


    Route::get('/admin-shipping-information-main/add', [AdminShippingController::class, 'getUserList']);
    Route::post('/admin-add-shipping-information', [AdminShippingController::class, 'addShippingInfor']);


    Route::get('/admin-book-main/add', [BookController::class, 'showAdditionalData']);
    Route::post('redirect/admin-add-book', [BookController::class, 'addBook']);

    Route::get('/admin-order-main/add', function () {
        return view('admin.addFunction.admin-add-order');
    });

    Route::get('/admin-category-main/add', function () {
        return view('admin.addFunction.admin-add-category');
    });
    Route::post('/admin-add-category', [AdminCategoryController::class, 'addCategory']);


    Route::get('/admin-subcategory-main/add', [AdminSubcategoryController::class, 'showCategoryList']);
    Route::post('/admin-add-subcategory', [AdminSubcategoryController::class, 'addSubcategory']);


    Route::get('/admin-publishing-company-main/add', function () {
        return view('admin.addFunction.admin-add-publishing-company');
    });
    Route::post('/admin-publishing-company', [AdminPublishingInformationController::class, 'addShippingInformation']);


    Route::get('/admin-author-main/add', function () {
        return view('admin.addFunction.admin-add-author');
    });
    Route::post('/admin-author', [AdminAuthorController::class, 'addAuthor']);

    //Delete data
    Route::get('/admin-user-main/{user_id}/delete', [UserController::class, 'deleteUser']);
    Route::get('/admin-publishing-company-main/{company_id}/delete', [AdminPublishingInformationController::class, 'deletePublishingCompany']);
    Route::get('/admin-author-main/{author_id}/delete', [AdminAuthorController::class, 'deleteAuthor']);
    Route::get('/admin-subcategory-main/{subcategory_id}/delete', [AdminSubcategoryController::class, 'deleteSubcategory']);
    Route::get('/admin-category-main/{category_id}/delete', [AdminCategoryController::class, 'deleteCategory']);
    Route::get('/admin-book-main/{book_id}/delete', [BookController::class, 'deleteBook']);
});

Route::group(['middleware' => ['user']], function () {
    Route::get('/cart', [CartController::class, 'showCartDetail']);
    Route::post('/cart/update-cart/{cart_id}/{book_id}', [CartController::class, 'updateCart']);
    Route::get('/cart/delete-cart-item/{cart_id}/{book_id}', [CartController::class, 'deleteCartItem']);
    Route::get('/cart/shipping-information', [ShippingController::class, 'showShippingListForChoosing']);
    Route::get('/cart/shipping-information-edit', [ShippingController::class, 'showShippingList']);
    Route::post('/cart/shipping-information-edit/add', [ShippingController::class, 'addShippingInformation']);
    Route::post('/cart/shipping-information-edit/edit/{cart_id}', [ShippingController::class, 'updateShippingInformation']);
    Route::get('/cart/shipping-information-edit/delete/{cart_id}', [ShippingController::class, 'deleteShipping']);
    Route::post('/order/{totalValue}', [OrderController::class, 'makeOrder']);
    Route::get('/handleCardPayment/{orderId}', [OrderController::class, 'handleCardPayment']);
    Route::get('/success', [OrderController::class, 'cardPaymentSuccess'])->name('checkout.success');
    Route::get('/fail', [OrderController::class, 'cardPaymentCancel'])->name('checkout.cancel');
});
