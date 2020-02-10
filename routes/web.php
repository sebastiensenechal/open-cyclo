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


// --------------------------
//          Racine
// --------------------------
Route::get('/', 'FlagMapController@index')->name('map');



// -----------------------------------------
//   Routes d'authentification et middleware
// -----------------------------------------
Auth::routes();
Auth::routes(['verify' => true]); // Activer la vérification des adresses mails. Implement dans User.php
Route::get('home', 'HomeController@index')->name('home')->middleware('admin', 'throttle:5,1'); // Admin + anti bruteforce
Route::get('contribute', 'ContributeController@index')->name('contribute')->middleware('contribute', 'throttle:30,1'); // Abonnés + anti brute force


Route::resource('posts', 'PostController');

Route::get('/our_flags', 'FlagMapController@index')->name('flag_map.index');
Route::resource('flags', 'FlagController');

Route::middleware('verified')->group(function () {
	Route::resource('user', 'UserController');
	Route::middleware('auth', 'admin')->group(function () {
	    Route::get('photo', 'PhotoController@getForm');
	    Route::post('photo', 'PhotoController@postForm');
	});
});


// --------------------------
//   Administrateur
// --------------------------
Route::middleware('admin', 'throttle:5,1')->group(function () { // Anti bruteforce, 5 accès par minute
    Route::get('user.index', 'UserController@index');
    Route::get('user.create', 'UserController@create');
    Route::post('user.store', 'UserController@store');
    Route::put('user.update', 'UserController@update');
    Route::get('user.edit', 'UserController@edit');
    Route::delete('user.destroy', 'UserController@destroy');

    Route::get('posts.create', 'PostController@create');
    Route::post('posts.store', 'PostController@store');
    Route::put('posts.update', 'PostController@update');
    Route::get('posts.edit', 'PostController@edit');
});

Route::delete('posts.destroy', 'PostController@destroy')->middleware('admin');



// --------------------------
//        Tous publics
// --------------------------

// Page d'aide, FAQ
Route::get('aide', function () {
    return view('help');
});

// Formulaire de contact
Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

// Inscription lettre d'information
Route::get('newsletter', 'NewsletterController@getForm');
Route::post('newsletter', ['uses' => 'NewsletterController@postForm', 'as' => 'storeEmail']);

Route::view('mention-legal', 'mention-legal');
Route::view('rgpd', 'rgpd');
Route::view('accessibilite', 'accessibilite');
