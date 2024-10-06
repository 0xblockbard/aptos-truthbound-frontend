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
Route::get('/guide', ['uses' => 'PagesController@guide'])->name('guide');
Route::get('/connected', ['uses' => 'PagesController@connected'])->name('connected');

Route::get('/campaigns', ['uses' => 'CampaignController@showAll'])->name('show_all_campaigns');
Route::get('/campaigns/{id}', ['uses' => 'CampaignController@show'])->name('show_campaign');

Route::get('/start', ['uses' => 'CampaignController@create'])->name('create_campaign');
Route::get('/campaigns/{id}/info', ['uses' => 'CampaignController@edit'])->name('edit_campaign');