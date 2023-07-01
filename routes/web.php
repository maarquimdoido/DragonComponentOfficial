<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\adminUserControllerMeh;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GithubController;
use App\Mail\SendEmail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
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


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Index')->name('home');
    Route::get('/credits', 'Credits')->name('credits');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug} ', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
});

Route::middleware(['auth', 'role:user'])->middleware('verified')->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/shipping-address', 'GetShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/cancel-checkout', 'CheckoutCancel')->name('cancelcheckout');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/confirmed-order', 'ConfirmedOrder')->name('confirmedorders');
        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorders');
        Route::get('/user-profile/orders', 'Orders')->name('orders');
        Route::get('/user-profile/canceled-orders', 'CanceledOrders')->name('canceledorders');
        Route::get('/todays-deal', 'TodaysDeal')->name( 'todaysdeal');
        Route::get('/custom-service', 'CustomerService')->name('customerservice');
        Route::get('/remove-cart-item{id}', 'RemoveCartItem')->name('removeitem');
        Route::get('/policy', 'ShowPolicy')->name('policy');
        Route::get('/terms', 'ShowTerms')->name('terms');
    });
});

Route::get('/home', function () {
    return view('/home');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [ProfileController::class, 'destroy'])
    ->name('profile.destroy')
    ->middleware('auth')
;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category{id}', 'DeleteCategory')->name('deletecategory');
    });

    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCat')->name('editsubcat');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
        Route::post('/admin/update-subcategory', 'UpdateSubCat')->name('updatesubcat');
    });

    Route::controller(AdminUserControllerMeh::class)->group(function () {
        Route::get('/admin/usersVerified', 'Verified')->name('usersVerified');
        
        Route::get('/admin/usersUnverified', 'Unverified')->name('usersUnverified');
        Route::get('/admin/users', 'Users')->name('users');
        Route::get('/admin/users/{uid}', 'userData')->name('userdata');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');
        Route::get('/admin/completed-order', 'CompletedOrder')->name('completedorder');
        Route::get('/admin/canceled-order', 'CanceledOrder')->name('canceledorder');
        Route::get('/admin/about-order', 'SeeMore')->name('aboutorder');
    });


});

Route::controller (PaypalController::class)->group (function(){ 
Route::get('/checkout', 'Index')->name('payment index');
Route :: post('/request-payment', 'Request Payment')->name ('requestpayment'); 
Route::get('/payment-success', 'PaymentSuccess')->name('payment success');
Route::get('/payment-cancel','PaymentCancel')->name('paymentCancel');
});
    	


require __DIR__ . '/auth.php';


Route::get('/home', 'HomeController@Index')->name('home')->middleware('verified');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
