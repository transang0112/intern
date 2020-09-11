<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoronavirusCaseController;
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

Route::resource('coronavirus_cases', 'App\Http\Controllers\CoronavirusCaseController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
