<?php

use App\Collection;
use Illuminate\Support\Facades\DB;
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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');




// Route Dashboard
Route::middleware('auth')->get('/Dashboard','DashboardController@index');
Route::middleware('auth')->get('photo', 'CollectionController@create');
Route::middleware('auth')->post('photo', 'CollectionController@store');

Route::middleware('auth')->get('/lesions','LesionController@index');

Route::middleware('auth','superadmin')->resource('list','UserController')->only('index','destroy','update');




