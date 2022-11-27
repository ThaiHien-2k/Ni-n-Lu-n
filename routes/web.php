<?php

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/contact', 'HomeController@contact')->name('home.contact');
Route::get('/introduce', 'HomeController@introduce')->name('home.introduce');

// Route::post('/susbcribe', 'NewsletterController@add')->name('newsletter.add');

Route::get('/dashboard', 'AdminController@index')->name('admin.index')->middleware(['auth','admin']);
// Route::patch('/dashboard', 'AdminController@updatereminder')->name('admin.reminder')->middleware(['auth','admin']);

Route::post('/changePassword','ResetPassController@changePassword')->name('changePassword');

Route::get('/order', 'AdminController@order')->name('admin.order')->middleware(['auth','admin']);
Route::get('/comment', 'AdminController@comment')->name('admin.comment')->middleware(['auth','admin']);
Route::get('/order/{id}', 'AdminController@show_order')->name('admin.showorder')->middleware(['auth','admin']);

Route::get('/user', 'AdminController@user')->name('admin.user')->middleware(['auth','admin']);

Route::get('/admin-product', 'ProductController@list')->name('admin.product')->middleware(['auth','admin']);

Route::get('/admin-product/detail/{id}', 'ProductController@detail')->name('admin.productDetail')->middleware(['auth','admin']);

Route::get('/admin-product/add', 'ProductController@form')->name('admin.addform')->middleware(['auth','admin']);
Route::post('/admin-product/add', 'ProductController@create')->name('product.create')->middleware(['auth','admin']);
Route::get('/admin-product/edit/{id}', 'ProductController@editform')->name('product.editform')->middleware(['auth','admin']);
Route::patch('/admin-product/edit/{id}', 'ProductController@edit')->name('product.edit')->middleware(['auth','admin']);
Route::get('/admin-product/remove/{id}', 'ProductController@remove')->name('product.remove')->middleware(['auth','admin']);



Route::get('/admin-stock', 'StockController@index')->name('admin.stock')->middleware(['auth','admin']);
Route::get('/admin-stock/show', 'StockController@show')->name('admin.stockshow')->middleware(['auth','admin']);
Route::get('/admin-stock/remove/{id}', 'StockController@remove')->name('admin.removestock')->middleware(['auth','admin']);
Route::get('/admin-stock/edit/{id}', 'StockController@editform')->name('admin.editform')->middleware(['auth','admin']);
Route::patch('/admin-stock/edit/{id}', 'StockController@editstock')->name('admin.editstock')->middleware(['auth','admin']);

Route::get('/admin-stock/add', 'StockController@addform')->name('admin.addstockform')->middleware(['auth','admin']);
Route::post('/admin-stock/add', 'StockController@addstock')->name('admin.addstock')->middleware(['auth','admin']);

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/user/remove/{id}', 'AdminController@removeUser')->name('user.remove')->middleware(['auth','admin']);

Route::get('/product/filter','ProductController@filter')->name('product.filter');

Route::get('/product/brand','ProductController@brand')->name('product.brand');

Route::get('/admin-comment','CommentController@store')->name('comments.store');
Route::get('/admin-comment/remove/{id}', 'CommentController@remove')->name('comment.remove')->middleware(['auth','admin']);
Route::get('/admin-comment/reply/{id}', 'CommentController@reply')->name('comment.reply')->middleware(['auth','admin']);
Route::get('/admin-comment/replied/{id}', 'CommentController@replied')->name('comment.replied')->middleware(['auth','admin']);


Route::get('/product/{product}','ProductController@show')->name('product.show');

Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/add/{product}','CartController@add')->name('cart.add');
Route::get('/cart/remove/{id}','CartController@remove')->name('cart.remove');

Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@checkout')->name('checkout')->middleware('auth');

Route::get('/user/order','OrderController@show')->name('order.show')->middleware('auth');

Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit')->middleware('auth');
Route::patch('/profile/{user}','ProfileController@update')->name('profile.update')->middleware('auth');

Route::get('/passwordReset/edit','ResetPassController@edit')->name('pass.edit')->middleware('auth');


Route::get('/search', 'SearchController@SearchProduct')->name('search');
Route::get('/searchBrand', 'SearchController@SearchProductBrand')->name('searchBrand');
Route::get('/order/changeStatus/{id}', 'OrderController@changeStatus')->name('changeStatus');


Route::get('/admin-insurance', 'InsuranceController@index')->name('admin.insurance')->middleware(['auth','admin']);
Route::patch('/admin-insurance/add/{id}/{status}', 'InsuranceController@addInsurance')->name('admin.addInsurance')->middleware(['auth','admin']);
Route::get('/admin-insurance/chooseLaptop', 'InsuranceController@chooseLaptop')->name('admin.chooseLaptop')->middleware(['auth','admin']);
Route::get('/admin-insurance/remove/{id}','InsuranceController@removeInsurance')->name('admin.insuranceRemove')->middleware(['auth','admin']);
Route::get('/admin-insurance/view/{id}', 'InsuranceController@view')->name('insurance.detail')->middleware(['auth','admin']);
Route::patch('/admin-insurance/edit/{id}', 'InsuranceController@edit')->name('insurance.edit')->middleware(['auth','admin']);
Route::get('/admin-insurance/addForm/{id}', 'InsuranceController@addForm')->name('insurance.addForm')->middleware(['auth','admin']);
Route::get('/admin-insurance/editForm/{id}', 'InsuranceController@editForm')->name('insurance.editForm')->middleware(['auth','admin']);
Route::get('/admin-insurance/serial/{id}/{model}', 'InsuranceController@serial')->name('insurance.laptop')->middleware(['auth','admin']);

Route::get('/admin-laptop/serialAdd/{id}/{model}', 'InsuranceController@serialAdd')->name('laptop.add')->middleware(['auth','admin']);
Route::get('/admin-laptop/serialEditForm/{id}', 'InsuranceController@serialEditForm')->name('laptop.edit')->middleware(['auth','admin']);
Route::patch('/admin-laptop/edit/{id}', 'InsuranceController@serialEdit')->name('laptop.serialEdit')->middleware(['auth','admin']);
Route::get('/admin-laptop/remove/{id}','InsuranceController@remove')->name('laptop.remove')->middleware(['auth','admin']);

Route::get('/admin-laptop', 'InsuranceController@laptop')->name('admin.laptop')->middleware(['auth','admin']);

Route::get('/admin-laptop/search', 'InsuranceController@searchSerial')->name('searchSerial')->middleware(['auth','admin']);
Route::get('/admin-laptop/searchInsurance', 'InsuranceController@searchInsurance')->name('searchInsurance')->middleware(['auth','admin']);

// viewInsuranceDetail
Route::get('/admin-insurance/viewInsuranceDetail/{id}/{time}', 'InsuranceController@viewInsuranceDetail')->name('insurance.viewDetail')->middleware(['auth','admin']);
Route::get('/admin-insurance/addDetailForm/{id}/{time}', 'InsuranceController@addDetailForm')->name('insuranceDetail.addDetailForm')->middleware(['auth','admin']);
Route::post('/admin-insurance/add', 'InsuranceController@create')->name('insuranceDetail.create')->middleware(['auth','admin']);

Route::get('/admin-insurance/removeDetail/{id}','InsuranceController@removeInsuranceDetail')->name('insuranceDetail.remove')->middleware(['auth','admin']);

Route::get('/admin-insurance/delivery/{id}','InsuranceController@delivery')->name('insuranceDetail.delivery')->middleware(['auth','admin']);
Route::get('/admin-insurance/editDetailForm/{id}/{time}', 'InsuranceController@editDetailForm')->name('insuranceDetail.editDetailForm')->middleware(['auth','admin']);
Route::patch('/admin-insurance/editDetail/{id}', 'InsuranceController@editDetail')->name('insuranceDetail.edit')->middleware(['auth','admin']);

// search
Route::get('/admin-laptop/ViewSearchInsuranceDetail', 'InsuranceController@ViewSearchInsuranceDetail')->name('ViewSearchInsuranceDetail');
Route::get('/admin-laptop/chooseInsuranceTime', 'InsuranceController@searchInsuranceDetail')->name('searchInsuranceDetail');
Route::get('/admin-laptop/viewDetail/{id}', 'InsuranceController@viewDetail')->name('viewDetail');
Route::get('/admin-insurance/detail/{id}/{time}', 'InsuranceController@detail')->name('Detail');

Auth::routes();