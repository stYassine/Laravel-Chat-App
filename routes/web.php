<?php

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


/// Chat
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/chat', [
        'uses' => 'ChatController@index',
        'as' => 'chat.index'
    ]);
    Route::get('/chat/{id}', [
        'uses' => 'ChatController@show',
        'as' => 'chat.show'
    ]);
    Route::get('/chat/getChat/{id}', [
        'uses' => 'ChatController@getChat',
        'as' => 'chat.getChat'
    ]);
    Route::post('/chat/sendChat', [
        'uses' => 'ChatController@sendChat',
        'as' => 'chat.sendChat'
    ]);
    
    
});