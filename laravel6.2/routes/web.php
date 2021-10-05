<?php

auth()->loginUsingId(1);
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

Route::get('/home', 'HomeController@index')
->name('home')
->middleware('auth');

Route::get('/contact','ContactController@show');
Route::post('/contact','ContactController@store');

Route::get('/payments/create', 'PaymentsController@create')->middleware('auth')->name('payments.create');
Route::post('/payments', 'PaymentsController@store')->middleware('auth')->name('payments.store');

//Route::get('payments/create','PaymentsController@create')->middleware('auth');
//Route::get('payments','PaymentsController@create')->middleware('auth');
Route::get('notifications','UserNotificationsController@show')->middleware('auth');

Route::get('conversations','ConversationsController@index');
Route::get('conversations/{conversation}','ConversationsController@show');

Route::post('best-replies/{reply}','ConversationBestReplyController@store');

Route::get('/reports', function () {
    return 'the secret reports';
})->middleware('can:edit_forum');


