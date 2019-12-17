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



/*
|--------------------------------------------------------------------------
| COMMANDES TERMINAL
|--------------------------------------------------------------------------
|
| Créer un controller depuis le terminal : php artisan make:controller ArticleController
| Afficher la liste des routes : php artisan route:list
|
*/


// --------------------------
//          Racine
// --------------------------
Route::get('/', ['uses' => 'MapController@index', 'as' => 'map']);



// ------------------------------
//   Routes d'authentification
// ------------------------------
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




// --------------------------
//   Utilisateur connecté
// --------------------------
Route::middleware('auth')->group(function () {
    // Route pour la gestion des utilisateurs
    Route::resource('user', 'UserController');
    // Formulaire ajout d'images
    Route::get('photo', 'PhotoController@getForm');
    Route::post('photo', 'PhotoController@postForm');
});




// --------------------------
//           Divers
// --------------------------
Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

// Page d'aide, FAQ
Route::get('aide', function () {
    return view('help');
});

// Formulaire de contact
Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

// Inscription lettre d'information
Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);
