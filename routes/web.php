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

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'app.categories.index','uses' => 'VRCategoriesController@adminIndex']);
        Route::get('/create', ['as' => 'app.categories.create','uses' => 'VRCategoriesController@adminCreate']);
        Route::post('/create', ['as' => 'app.categories.store', 'uses' => 'VRCategoriesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.categories.edit', 'uses' => 'VRCategoriesController@adminEdit']);
            Route::post('/edit', ['as' => 'app.categories.update', 'uses' => 'VRCategoriesController@adminUpdate']);
            Route::get('/', ['as' => 'app.categories.show', 'uses' => 'VRCategoriesController@adminShow']);
            Route::delete('/', ['as' => 'app.categories.delete', 'uses' => 'VRCategoriesController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', ['as' => 'app.pages.index','uses' => 'VRCategoriesController@adminIndex']);
        Route::get('/create', ['as' => 'app.pages.create','uses' => 'VRCategoriesController@adminCreate']);
        Route::post('/create', ['as' => 'app.pages.store', 'uses' => 'VRCategoriesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.pages.edit', 'uses' => 'VRCategoriesController@adminEdit']);
            Route::post('/edit', ['as' => 'app.pages.update', 'uses' => 'VRCategoriesController@adminUpdate']);
            Route::get('/', ['as' => 'app.pages.show', 'uses' => 'VRCategoriesController@adminShow']);
            Route::delete('/', ['as' => 'app.pages.delete', 'uses' => 'VRCategoriesController@adminDestroy']);
        });
    });


    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', ['as' => 'app.languages.index','uses' => 'VRLanguagesController@adminIndex']);
        Route::get('/create', ['as' => 'app.languages.create','uses' => 'VRLanguagesController@adminCreate']);
        Route::post('/create', ['as' => 'app.languages.store', 'uses' => 'VRLanguagesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.languages.edit', 'uses' => 'VRLanguagesController@adminEdit']);
            Route::post('/edit', ['as' => 'app.languages.update', 'uses' => 'VRLanguagesController@adminUpdate']);
            Route::get('/', ['as' => 'app.languages.show', 'uses' => 'VRLanguagesController@adminShow']);
            Route::delete('/', ['as' => 'app.languages.delete', 'uses' => 'VRLanguagesController@adminDestroy']);
        });
    });
    



});
