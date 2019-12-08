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

// Créer un controller depuis le terminal : php artisan make:controller ArticleController

// Route::get('/', ['as' => 'home', function () {
//     return view('welcome');
// }]);

Route::get('/', ['uses' => 'WelcomeController@index', 'as' => 'home']);

// Route::get('article/{n}', function($n) {
//     return view('article')->withNumero($n);
// })->where('n', '[0-9]+');

Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

Route::get('facture/{n}', function($n) {
    return view('facture')->withNumero($n);
})->where('n', '[0-9]+');

/* Page d'aide */
Route::get('aide', function () {
    return view('help');
});

// Formulaire users
Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');

// Formulaire de contact
Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

// Formulaire ajout d'images
Route::get('photo', 'PhotoController@getForm');
Route::post('photo', 'PhotoController@postForm');
