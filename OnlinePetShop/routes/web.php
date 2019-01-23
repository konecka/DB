<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Продукты
// Route::get('/products', function () {
//    return redirect('/products/0');
// });
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
Route::post('/products/store', 'ProductController@store')->name('products.store');


// Категории
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');

Route::post('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
Route::post('/categories/store', 'CategoryController@store')->name('categories.store');


// Производители
Route::get('manufacturers', 'ManufacturerController@index')->name('manufacturers.index');
Route::get('/manufacturers/destroy/{id}', 'ManufacturerController@destroy')->name('manufacturers.destroy');
Route::get('/manufacturers/edit/{id}', 'ManufacturerController@edit')->name('manufacturers.edit');
Route::get('/manufacturers/create', 'ManufacturerController@create')->name('manufacturers.create');

Route::post('/manufacturers.index/update/{id}', 'ManufacturerController@update')->name('manufacturers.update');
Route::post('/manufacturers/store', 'ManufacturerController@store')->name('manufacturers.store');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Маршруты регистрации...
 */
 
//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');