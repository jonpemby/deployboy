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
    return view('welcome', ['omit_nav' => true]);
});

Route::resource('droplets', 'DropletsController');

Route::get('test', function () {
    auth()->login(\App\User::find(1));

    //dd(auth()->user());

    return redirect('/droplets');
});

/**
 * OAuth Routes
 */
Route::get('/login/github', 'Oauth\GithubController@redirectToProvider')->name('github.register');
Route::get('/oauth/github', 'Oauth\GithubController@handleProviderCallback')->name('github.callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
