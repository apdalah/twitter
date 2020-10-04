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
})->name('welcome');

Auth::routes();

Route::middleware('auth')->group(function(){

    // get all tweets
    Route::get('/home', 'TweetController@index')->name('home');
    //store tweet
    Route::post('/tweets', 'TweetController@store');
    // like a tweet
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');
    // follow and unfollow
    Route::post('/follow/{user}', 'FollowController@store')->name('follow');
    // edit user profile
    Route::get('/{user}/edit', 'ProfileController@edit')->name('edit-profile')->middleware('can:edit,user');
    // update user profile
    Route::patch('/{user}', 'ProfileController@update')->name('update-profile')->middleware('can:edit,user');
    // exploring more friends
    Route::get('/explore', 'ExploreController@index')->name('explore');
});

Route::get('/{user}', 'ProfileController@show')->name('profile');



