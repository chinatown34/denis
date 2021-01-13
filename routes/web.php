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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::get('person/for_moderation', 'PersonController@forModeration')->name('person.forModeration');
    Route::get('person/for_review', 'PersonController@forReview')->name('person.forReview');
    Route::resource('person', 'PersonController');
    Route::get('result/for_moderation', 'ResultController@forModeration')->name('result.forModeration');
    Route::get('result/moderated', 'ResultController@moderated')->name('result.moderated');
    Route::get('result/mine_all', 'ResultController@mineAll')->name('result.mineAll');
    Route::get('result/mine', 'ResultController@mine')->name('result.mine');
    Route::resource('result', 'ResultController');
});
