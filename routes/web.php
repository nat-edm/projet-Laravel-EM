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

// Page d'accueil avec tous les produits
Route::get('/', 'FrontController@index');

// Page produit
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Page catégorie
Route::get('category/{id}', 'FrontController@ProductsByCategory')->where(['id' => '[0-9]+']);

// Page soldes
Route::get('product/{code}', 'FrontController@ProductsOnSale')->where(['code' => 'solde']);

// Page dashboard
Auth::routes(); // routes pour le login Laravel avec la commande php artisan make:auth
Route::resource('admin', 'ProductController')->name('get','admin')->middleware('auth');
