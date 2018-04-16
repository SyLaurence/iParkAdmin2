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


// Login
Route::get('/','LoginController@index');
Route::get('check/{obj}','LoginController@check');
Route::get('logout','LoginController@logout');


// Dashboard
Route::get('/home', function () {
    return view('home');
});

Route::get('/search', function () {
    return view('search');
});

Route::resource('Rate','RateController');
	Route::get('Rate/add/{obj}','RateController@add');
	Route::get('Rate/toEdit/{obj}','RateController@toEdit');
	Route::get('Rate/delete/{obj}','RateController@delete');

	Route::get('Terminal','TerminalController@index');
	Route::get('Terminal/add/{obj}','TerminalController@add');
	Route::get('Terminal/toEdit/{obj}','TerminalController@toEdit');
	Route::get('Terminal/delete/{obj}','TerminalController@delete');
	Route::get('SelectTerminal','TerminalController@getTerminal');

	Route::get('User','UserController@index');
	Route::get('User/add/{obj}','UserController@add');
	Route::get('User/toEdit/{obj}','UserController@toEdit');
	Route::get('User/delete/{obj}','UserController@delete');
	Route::get('User/priv/{obj}','UserController@priv');

	Route::get('Report','ReportController@index');
	Route::get('Report/print/{from}/{to}/{id}','ReportController@printPDF');
	Route::get('Search/{obj}','ReportController@search');

