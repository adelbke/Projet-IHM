<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('photo', 'ImageController@create');
Route::post('photo', 'ImageController@store');


// Route Dashboard
Route::middleware('auth')->get('/Dashboard',function ()
{
    return view('Dashboard');
});
Route::middleware('auth')->get('photo', 'CollectionController@create');
Route::middleware('auth')->post('photo', 'CollectionController@store');
