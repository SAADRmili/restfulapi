<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//buyers
Route::resource('buyers' ,'Buyer\BuyerController',['only'=>['index','show']]);

//Categories
Route::resource('categories' ,'Category\CategoryController',['except'=>['create','edit']]);

//sallers
Route::resource('sellers' ,'Seller\SellerController',['only'=>['index','show']]);

//products
Route::resource('products' ,'Product\ProductController',['only'=>['index','show']]);

//transactions
Route::resource('transactions' ,'Transaction\TransactionController',['only'=>['index','show']]);
Route::resource('transactions.categories' ,'Transaction\TransactionCategoryController',['only'=>['index']]);
Route::resource('transactions.sellers' ,'Transaction\TransactionSellerController',['only'=>['index']]);

//user
Route::resource('users' ,'User\UserController',['except'=>['create','edit']]);
