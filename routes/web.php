<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::resource('customers', 'CustomerController');
    Route::resource('items', 'ItemController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('employees', 'EmployeeController');
    Route::resource('receivings', 'ReceivingController');
    Route::resource('receiving-item', 'ReceivingItemController');

    

    Route::resource('inventory', 'InventoryController');

    Route::get('my-account', 'UserController@index' );
    Route::post('change-pass', [
        'as' => 'change.pass',
        'uses' => 'UserController@postCredentials'
        ] );
});

//Route::resource('api/item', 'ReceivingApiController');

Route::get('api/items', function(){
    return App\Item::all();
});



