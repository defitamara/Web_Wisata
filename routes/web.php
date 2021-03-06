<?php

#use Illuminate\Http\Request;
#use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Backend'], function()
{
    Route::resource('dashboard','DashboardController');
    Route::resource('artikel','ArtikelController');
    Route::get('/artikel/{id}/detail','ArtikelController@detail');
    Route::resource('galeri','GaleriController');
});

Route::group(['namespace' => 'Frontend'], function()
{
    Route::resource('home','HomeController');
});
