<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| mcamara Routes
|--------------------------------------------------------------------------
|
| Here is where you can register mcamara routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "mcamara" middleware group. Now create something great!
|
*/

Route::get('/mcamara', function () {
    return 'welcome to Mcamara!!!';
});

route::group(['prefix' => LaravelLocalization::setLocale() ,'namespace' => 'Admin' ,'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']] ,
function ()
{

        route::resource('/offers' ,'OfferController');
        route::resource('/comments' ,'CommentsController');

});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
