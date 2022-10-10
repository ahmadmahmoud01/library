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
use Illuminate\Support\Facades\Route;
// use Illuminate\Auth\Middleware\UserAuth;

/* Auth */

// Register
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/do-Register', 'AuthController@doRegister')->name('doRegister');

// Login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/do-Login', 'AuthController@doLogin')->name('doLogin');

// Nobody can Make Logout Without Login Because Of Middleware
Route::middleware('userAuth')->group(function() {
    // Logout
     Route::get('/logout', 'AuthController@logout')->name('logout');

     // Create
    Route::get('/authors/create', 'AuthorController@create')->name('createAuthor');
    Route::post('/authors/store', 'AuthorController@store')->name('storeAuthor');

    // Update
    Route::get('/authors/edit/{id}', 'AuthorController@edit')->name('editAuthor');
    Route::post('/authors/update/{id}', 'AuthorController@update')->name('updateAuthor');

    
    // create
    Route::get('/books/create', 'BookController@create')->name('createBook');
    Route::post('/books/store', 'BookController@store')->name('storeBook');
    
    // Update
    Route::get('/books/edit/{id}', 'BookController@edit')->name('editBook');
    Route::post('/books/update/{id}', 'BookController@update')->name('updateBook');

    Route::middleware('isAdmin')->group(function() {

        // Delete
        Route::get('/authors/delete/{id}', 'AuthorController@delete')->name('deleteAuthor');
    
        //Delete
        Route::get('/books/delete/{id}', 'BookController@delete')->name('deleteBook');
        
    });

});




Route::get('/', function () {
    return view('welcome');
});

Route::post('/message/send', 'MessageController@send')->name('sendMessage');


/* Authors */

// Read
Route::get('/authors', 'AuthorController@index')->name('allAuthors');
Route::get('/authors/latest', 'AuthorController@latest')->name('latestAuthors');
Route::get('/authors/show/{id}', 'AuthorController@show')->name('showAuthor');
Route::get('/authors/search/{word}', 'AuthorController@search')->name('searchAuthors');




/* Books */

// Read
Route::get('/books', 'BookController@index')->name('allBooks');
// Route::get('/books/latest', 'BookController@latest')->name('LatestBooks');
Route::get('/books/show/{id}', 'BookController@show')->name('showBook');
// Route::get('/books/search/{word}', 'BookController@search')->name('searchBooks');



