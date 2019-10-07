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

Route::get('/', 'HomeController@index');
//Route::group(['prefix' => ''], function (){
//    Route::get('products{slug}', ['as' => 'product.details', 'uses' => 'ProductController@viewBySlug']);
//    Route::post('{slug}', ['as' => 'product.details', 'uses' => 'RatingController@postAdd']);
//
//});
Route::get('products/{slug}', ['as' => 'product.details', 'uses' => 'ProductController@viewBySlug']);
Route::post('comment/{id}', ['as' => 'comment.product', 'uses' => 'RatingController@postAdd'] );
Route::get('shop', 'HomeController@shop')->name('shop');

//shopping cart
Route::post('add-cart',['as' => 'add.cart', 'uses' => 'CartController@addItem'] );
Route::get('view-cart', ['as' => 'cart.details', 'uses' => 'CartController@viewCart']);
Route::post('update-cart', ['as' => 'update.cart', 'uses' => 'CartController@updateCart']);
Route::get('delete-cart/{id}', ['as' => 'delete.cart', 'uses' => 'CartController@deleteItem']);
Route::get('clear-cart', ['as' => 'clear.cart', 'uses' => 'CartController@clearCart']);
Route::post('checkout', ['as' => 'checkout.cart', 'uses' => 'CartController@checkOut']);

//admin
Route::group(['prefix' => 'admin'], function (){
   Route::get('/', 'HomeController@admin');
   Route::group(['prefix' => 'categories'], function (){
      Route::get('/', function (){
          return redirect()->route('categories.view');
      });
       Route::get('view', ['as' => 'categories.view', 'uses' => 'CategoriesController@view']);
       Route::get('add', ['as' => 'categories.insert', 'uses' => 'CategoriesController@getAdd']);
       Route::post('add', ['as' => 'categories.insert', 'uses' => 'CategoriesController@postAdd']);
       Route::get('delete/{id}', ['as' => 'categories.delete', 'uses' => 'CategoriesController@getDelete']);
       Route::get('update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@getEdit']);
       Route::post('update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@postEdit']);
   });

   //sub category
    Route::group(['prefix' => 'sub-categories'], function (){
        Route::get('/', function (){
            return redirect()->route('categories.view');
        });
        Route::get('view', ['as' => 'sub-categories.view', 'uses' => 'SubCategoryController@view']);
        Route::get('add', ['as' => 'sub-categories.insert', 'uses' => 'SubCategoryController@getAdd']);
        Route::post('add', ['as' => 'sub-categories.insert', 'uses' => 'SubCategoryController@postAdd']);
        Route::get('delete/{id}', ['as' => 'sub-categories.delete', 'uses' => 'SubCategoryController@getDelete']);
        Route::get('update/{id}', ['as' => 'sub-categories.update', 'uses' => 'SubCategoryController@getEdit']);
        Route::post('update/{id}', ['as' => 'sub-categories.update', 'uses' => 'SubCategoryController@postEdit']);
    });

    //products
    Route::group(['prefix' => 'products'], function (){
        Route::get('/', function (){
            return redirect()->route('products.view');
        });
        Route::get('view', ['as' => 'products.view', 'uses' => 'ProductController@view']);
        Route::get('add', ['as' => 'products.insert', 'uses' => 'ProductController@getAdd']);
        Route::post('add', ['as' => 'products.insert', 'uses' => 'ProductController@postAdd']);
        Route::get('delete/{id}', ['as' => 'products.delete', 'uses' => 'ProductController@getDelete']);
        Route::get('update/{id}', ['as' => 'products.update', 'uses' => 'ProductController@getEdit']);
        Route::post('update/{id}', ['as' => 'products.update', 'uses' => 'ProductController@postEdit']);
    });

    Route::group(['prefix' => 'ratings'], function (){
        Route::get('/', function (){
            return redirect()->route('ratings.view');
        });
        Route::get('view', ['as' => 'ratings.view', 'uses' => 'RatingController@view']);
        Route::get('details/{id}', ['as' => 'ratings.details', 'uses' => 'RatingController@viewDetails']);
        Route::get('delete/{id}', ['as' => 'ratings.delete', 'uses' => 'RatingController@getDelete']);
    });
    //Order
    Route::group(['prefix' => 'orders'], function (){
        Route::get('/', function (){
            return redirect()->route('orders.view');
        });
        Route::get('view', ['as' => 'orders.view', 'uses' => 'OrderController@view']);
        Route::get('details/{id}', ['as' => 'orders.details', 'uses' => 'OrderController@viewDetails']);
        Route::get('update/{id}', ['as' => 'orders.update', 'uses' => 'OrderController@editOrder']);
        Route::get('del-detail/{id}', ['as' => 'delete.details', 'uses' => 'OrderController@deleteDetail']);
        Route::get('delete/{id}', ['as' => 'orders.delete', 'uses' => 'OrderController@getDelete']);
    });

    //user and admin
    Route::group(['prefix' => 'users'], function (){
       Route::get('/', function (){
          return redirect()->route('users.view');
       });
       Route::get('view', ['as' => 'users.view', 'uses' => 'UserController@view']);
       Route::get('update/{id}', ['as' => 'users.update', 'uses' => 'UserController@getEdit']);
       Route::post('update/{id}', ['as' => 'users.update', 'uses' => 'UserController@postEdit']);
       Route::get('delete/{id}', ['as' => 'users.delete', 'uses' => 'UserController@getDelete']);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
