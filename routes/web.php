<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/service',[HomeController::class, 'service'])->name('service');
Route::get('/menu',[HomeController::class, 'menu'])->name('menu');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
Route::post('/store-contact',[HomeController::class, 'storeContact'])->name('store-contact');
Route::get('/category-product/{id}',[HomeController::class, 'categoryProduct'])->name('category-product');

//User Login
Route::get('/user-register',[UserController::class, 'register'])->name('user-register');
Route::post('/user_register',[UserController::class, 'userRegister'])->name('user_register');
Route::get('/user-login',[UserController::class, 'login'])->name('user-login');
Route::post('/user_login',[UserController::class, 'userlogin'])->name('user_login');
Route::get('/user-logout',[UserController::class, 'userlogout'])->name('user-logout');
//Admin Login
Route::get('/admin-register',[AdminlogController::class, 'register'])->name('admin-register');
Route::post('/admin_register',[AdminlogController::class, 'adminRegister'])->name('admin_register');
Route::get('/admin-login',[AdminlogController::class, 'login'])->name('admin-login');
Route::post('/admin_login',[AdminlogController::class, 'adminlogin'])->name('admin_login');
////
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/update-cart/{id}', [CartController::class, 'updateCart'])->name('update-cart');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');
// Mail
Route::get('/mail', [MailController::class, 'mail'])->name('mail');
Route::post('/send-mail', [MailController::class, 'sendMail'])->name('send-mail');

Route::group(['middleware'=>'user'],function(){
Route::get('/delivery/{id}', [CartController::class, 'delivery'])->name('delivery');
Route::get('/delivery-cart/{id}', [CartController::class, 'deliveryCart'])->name('delivery-cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/store-delivery',[CartController::class, 'storeDevilery'])->name('store-delivery');

}); 

// Route::group(['prefix' =>'admin',
// 'middleware' =>config('jetstream.middleware', ['admin'])], function () {
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    // About
    Route::get('/add-about',[AdminController::class, 'addAbout'])->name('add-about');
    Route::post('/store-about',[AdminController::class, 'storeAbout'])->name('store-about');
    Route::get('/manage-about',[AdminController::class, 'manageAbout'])->name('manage-about');
    Route::get('/edit-about/{id}',[AdminController::class, 'editAbout'])->name('edit-about');
    Route::post('/update-about/{id}',[AdminController::class, 'updateAbout'])->name('update-about');
    Route::get('/delete-about/{id}',[AdminController::class, 'deleteAbout'])->name('delete-about');
    Route::get('/admin-logout',[AdminController::class, 'adminLogout'])->name('admin-logout');
    // Service
    
    Route::get('/add-service',[ServiceController::class, 'addService'])->name('add-service');
    Route::post('/store-service',[ServiceController::class, 'storeService'])->name('store-service');
    Route::get('/manage-service',[ServiceController::class, 'manageService'])->name('manage-service');
    Route::get('/edit-service/{id}',[ServiceController::class, 'editService'])->name('edit-service');
    Route::post('/update-service/{id}',[ServiceController::class, 'updateService'])->name('update-service');
    Route::get('/Delete-service/{id}',[ServiceController::class, 'deleteService'])->name('delete-service');
    // Product
    Route::get('/add-product',[ProductController::class, 'addProduct'])->name('add-product');
    Route::post('/store-product',[ProductController::class, 'storeProduct'])->name('store-product');
    Route::get('/manage-product',[ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('/edit-product/{id}',[ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/update-product/{id}',[ProductController::class, 'updateProduct'])->name('update-product');
    Route::get('/delete-product/{id}',[ProductController::class, 'deleteProduct'])->name('delete-product');
    Route::get('/manage-contact',[HomeController::class, 'manageContact'])->name('manage-contact');
    Route::get('/delete-contact/{id}',[HomeController::class, 'deleteContact'])->name('delete-contact');
    Route::get('/manage-delivery',[HomeController::class, 'manageDelivery'])->name('manage-delivery');
    Route::get('/edit-delivery/{id}',[HomeController::class, 'editDelivery'])->name('edit-delivery');
    Route::post('/update-delivery/{id}',[HomeController::class, 'updateDelivery'])->name('update-delivery');
    Route::get('/delete-delivery/{id}',[HomeController::class, 'deleteDelivery'])->name('delete-delivery');
});
    


