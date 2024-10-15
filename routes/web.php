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

Route::get('/', ['uses' => 'PagesController@home'])->name('home');
Route::get('/about', ['uses' => 'PagesController@about'])->name('about');
Route::get('/assert-data', ['uses' => 'PagesController@assertData'])->name('assert_data');
Route::get('/dispute-data', ['uses' => 'PagesController@disputeData'])->name('dispute_data');
Route::get('/guide', ['uses' => 'PagesController@guide'])->name('guide');