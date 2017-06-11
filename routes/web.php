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
















Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix' => 'admin', 'middleware' => 'check-if-admin'], function() {

    Route::get('/', [

        'uses' => 'DashBoardController@index',
        'as'   => 'admin.home'

    ]);

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'admin.categories.index','uses' => 'VRCategoriesController@adminIndex']);
        Route::get('/create', ['as' => 'admin.categories.create','uses' => 'VRCategoriesController@adminCreate']);
        Route::post('/create', ['as' => 'admin.categories.store', 'uses' => 'VRCategoriesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'admin.categories.edit', 'uses' => 'VRCategoriesController@adminEdit']);
            Route::post('/edit', ['as' => 'admin.categories.update', 'uses' => 'VRCategoriesController@adminUpdate']);
            Route::get('/', ['as' => 'admin.categories.show', 'uses' => 'VRCategoriesController@adminShow']);
            Route::delete('/', ['as' => 'admin.categories.delete', 'uses' => 'VRCategoriesController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', ['as' => 'admin.pages.index','uses' => 'VRPagesController@adminIndex']);
        Route::get('/create', ['as' => 'admin.pages.create','uses' => 'VRPagesController@adminCreate']);
        Route::post('/create', ['as' => 'admin.pages.store', 'uses' => 'VRPagesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'admin.pages.edit', 'uses' => 'VRPagesController@adminEdit']);
            Route::post('/edit', ['as' => 'admin.pages.update', 'uses' => 'VRPagesController@adminUpdate']);
            Route::get('/', ['as' => 'admin.pages.show', 'uses' => 'VRPagesController@adminShow']);
            Route::delete('/', ['as' => 'admin.pages.delete', 'uses' => 'VRPagesController@adminDestroy']);
        });
    });


    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', ['as' => 'admin.languages.index','uses' => 'VRLanguagesController@adminIndex']);
        Route::get('/create', ['as' => 'admin.languages.create','uses' => 'VRLanguagesController@adminCreate']);
        Route::post('/create', ['as' => 'admin.languages.store', 'uses' => 'VRLanguagesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'admin.languages.edit', 'uses' => 'VRLanguagesController@adminEdit']);
            Route::post('/edit', ['as' => 'admin.languages.update', 'uses' => 'VRLanguagesController@adminUpdate']);
            Route::get('/', ['as' => 'admin.languages.show', 'uses' => 'VRLanguagesController@adminShow']);
            Route::delete('/delete', ['as' => 'admin.languages.delete', 'uses' => 'VRLanguagesController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'admin.users.index','uses' => 'VRUsersController@adminIndex']);
        Route::get('/create', ['as' => 'admin.users.create','uses' => 'VRUsersController@adminCreate']);
        Route::post('/create', ['as' => 'admin.users.store', 'uses' => 'VRUsersController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'admin.users.edit', 'uses' => 'VRUsersController@adminEdit']);
            Route::post('/edit', ['as' => 'admin.users.update', 'uses' => 'VRUsersController@adminUpdate']);
            Route::get('/', ['as' => 'admin.users.show', 'uses' => 'VRUsersController@adminShow']);
            Route::delete('/', ['as' => 'admin.users.delete', 'uses' => 'VRUsersController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', ['as' => 'admin.orders.index','uses' => 'VROrdersController@adminIndex']);
        Route::get('/create', ['as' => 'admin.orders.create','uses' => 'VROrdersController@adminCreate']);
        Route::post('/create', ['as' => 'admin.orders.store', 'uses' => 'VROrdersController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'admin.orders.edit', 'uses' => 'VROrdersController@adminEdit']);
            Route::post('/edit', ['as' => 'admin.orders.update', 'uses' => 'VROrdersController@adminUpdate']);
            Route::get('/', ['as' => 'admin.orders.show', 'uses' => 'VROrdersController@adminShow']);
            Route::delete('/', ['as' => 'admin.orders.delete', 'uses' => 'VROrdersController@adminDestroy']);
        });
    });
    

});



Route::group(['prefix' => 'user', 'middleware' => 'check-if-user'], function() {

    Route::get('/', ['uses'  => 'UserCPController@index', 'as'    => 'user.orders.index']);
    Route::get('/{id}', ['uses'  => 'UserCPController@show', 'as'    => 'user.orders.show']);

});


Auth::routes();

Route::group(['prefix' => 'reservations'], function() {

    Route::get('/create/{day?}', ['uses'  => 'ReservationController@create', 'as'    => 'frontend.reservation.create']);
    Route::post('/create', ['uses'  => 'ReservationController@store', 'as'    => 'frontend.reservation.store']);

});


Route::group(['prefix' => '{language?}', 'middleware' => 'check-language'], function () {

    Route::get('/', ['uses'  => 'FrontEndController@index', 'as'    => 'frontend.index']);
    Route::get('/{id}', ['uses'  => 'FrontEndController@show', 'as'    => 'frontend.show']);



});


