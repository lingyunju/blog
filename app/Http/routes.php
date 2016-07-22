<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['namespace' => 'Home'], function () {
    Route::get('/','IndexController@index');
    Route::get('newslist','IndexController@newslist');
    Route::get('cate/{id}','IndexController@cate');
});

Route::group(['middleware' => 'admin.login','namespace' => 'Admin','prefix' => 'admin'], function () {
    Route::get('/','IndexController@index');
    Route::get('index','IndexController@index');
    Route::get('loginout','LoginController@loginOut');
    Route::any('changepass','IndexController@changePass');
    Route::post('changeorder','CateController@changeOrder');
    Route::post('cate/delete','CateController@delete');
    Route::resource('cate', 'CateController');
    Route::post('article/delete','ArticleController@delete');
    Route::resource('article', 'ArticleController');
    Route::resource('links', 'LinksController');
    Route::resource('navs', 'NavsController');
    Route::resource('config', 'ConfigController');
});

Route::any('admin/login','Admin\LoginController@login');