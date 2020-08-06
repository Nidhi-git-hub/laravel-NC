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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get','post'],'/','IndexController@index');

Route::match(['get','post'],'/admin','AdminController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']],function(){
	Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');

	//Category Route
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::match(['get','post'],'/admin/view-categories','CategoryController@viewCategories');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::post('/admin/update-category-status','CategoryController@updateStatus');

	//Product Route
	Route::match(['get','post'],'/admin/add-product','ProductController@addProduct');
	Route::match(['get','post'],'/admin/view-products','ProductController@viewProducts');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductController@editProduct');
	Route::match(['get','post'],'/admin/delete-product/{id}','ProductController@deleteProduct');
	Route::post('/admin/update-product-status','ProductController@updateStatus');
	Route::post('/admin/update-featured-product-status','ProductController@updateFeatured');

	//Banner Route
	Route::match(['get','post'],'/admin/banners','BannerController@banners');
	Route::match(['get','post'],'/admin/add-banner','BannerController@addBanner');
	Route::match(['get','post'],'/admin/edit-banner/{id}','BannerController@editBanner');
	Route::match(['get','post'],'/admin/delete-banner/{id}','BannerController@deleteBanner');
	Route::post('/admin/update-banner-status','BannerController@updateStatus');
});
Route::get('/logout','AdminController@logout');
