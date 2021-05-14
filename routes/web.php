<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Isadmin;

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

// Route::resource('/', 'Postcontroller');

Route::get('/','PostController@home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Route::group(['middleware' => ['auth']], function () {
   Route::resource('/post', 'PostController');
});

// 'middleware' => ['auth']

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['isadmin'] ], function () {
   Route::get('/', 'IndexController@index');
   Route::get('/create', 'IndexController@create');
});