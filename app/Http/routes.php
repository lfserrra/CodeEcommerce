<?php

Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
Route::get('/category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('/product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('/tag/{id}', ['as' => 'tag.product', 'uses' => 'StoreController@tag']);

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function ()
{

    Route::group(['prefix' => 'categories'], function ()
    {
        Route::get('/', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
        Route::delete('{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function ()
    {
        Route::get('/', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
        Route::delete('{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);

        Route::group(['prefix' => '{id}/images'], function ()
        {
            Route::get('/', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('/', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::delete('{id_image}', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage'])->where(['id_image' => '[0-9]+']);
        });
    });
});