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

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', function() {
       return view('admin.home');
    });

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
        Route::get('/', ['as' => 'admin.pages.index','uses' => 'VRCategoriesController@adminIndex']);
        Route::get('/create', ['as' => 'admin.pages.create','uses' => 'VRCategoriesController@adminCreate']);
        Route::post('/create', ['as' => 'admin.pages.store', 'uses' => 'VRCategoriesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'admin.pages.edit', 'uses' => 'VRCategoriesController@adminEdit']);
            Route::post('/edit', ['as' => 'admin.pages.update', 'uses' => 'VRCategoriesController@adminUpdate']);
            Route::get('/', ['as' => 'admin.pages.show', 'uses' => 'VRCategoriesController@adminShow']);
            Route::delete('/', ['as' => 'admin.pages.delete', 'uses' => 'VRCategoriesController@adminDestroy']);
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
            Route::delete('/', ['as' => 'admin.languages.delete', 'uses' => 'VRLanguagesController@adminDestroy']);
        });
    });
    



});
