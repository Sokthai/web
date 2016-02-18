<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {


    Route::resource('books', 'BookController');
    Route::resource('searched', 'BookSearchController');

    Route::get('delete/{id}', 'BookController@delete');
//    Route::get('search', function () {
//
//        return view('pages.search');
//    });

    Route::get('report', 'BookController@report');
    Route::get('search', 'BookSearchController@create');
    //Route::get('searched', function(){
    //    return "searched ok";
    //});
    Route::get('logout', 'BookController@logout');


    Route::get('sendemail', 'BookSearchController@sendemail');









});




Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

