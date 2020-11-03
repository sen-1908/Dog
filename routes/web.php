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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('top');
});

Route::post('login', 'Auth\LoginController@authenticate');

// Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function() 
// {
//     Route::get('index', 'ContactFormController@index')->name('index');
//     Route::get('create', 'ContactFormController@create')->name('create');
//     Route::post('store', 'ContactFormController@store')->name('store');
//     Route::get('show/{id}', 'ContactFormController@show')->name('show');
//     Route::get('edit/{id}', 'ContactFormController@edit')->name('edit');
//     Route::post('update/{id}', 'ContactFormController@update')->name('update');
//     Route::post('destroy/{id}', 'ContactFormController@destroy')->name('destroy');

// });
Route::group(['prefix' => 'enday' , 'middleware' => 'auth'], function()
{
    Route::get('index', 'endayController@index')->name('index');
    Route::get('today', 'endayController@today')->name('today');
    Route::get('rank', 'endayController@rank')->name('rank');
    Route::post('index', 'endayController@PostTweet')->name('Post');
    Route::get('new', 'endayController@new')->name('new');
    
});
Route::group(['prefix' => 'user' , 'middleware' => 'auth'], function()
{
    Route::get('index', 'UserController@index')->name('user.index');   
    Route::get('my_favorite/{id}', 'profileController@my_favorite')->name('my_favorite');   
    Route::get('my_post', 'profileController@my_post')->name('my_post');   
    Route::post('destroy/{id}', 'UserController@destroy')->name('destroy');
    Route::post('destroy_profile/{id}', 'UserController@destroy_profile')->name('user.destroy');
    Route::post('destroy_post/{id}', 'UserController@destroy_post')->name('post.destroy');
    Route::get('profile/{id}', 'UserController@profile')->name('user.profile');   
    Route::get('history', 'UserController@history')->name('history');   
    Route::post('history.', 'UserController@userPost')->name('user.post');   
    // Route::post('index', 'UserController@UserHistory')->name('user.history');
    
    Route::get('edit', 'UserController@userEdit')->name('user.edit');   
    Route::post('edit', 'UserController@userUpdate')->name('user.update');   
    
});
Route::get('/reply/like/{id}', 'endayController@like')->name('reply.like');
Route::get('/reply/unlike/{id}', 'endayController@unlike')->name('reply.unlike');
Route::get('comment/{id}', 'endayController@comment')->name('comment');
// Route::post('commen', 'endayController@comment')->name('comment');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
