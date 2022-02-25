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

Route::get('/', 'HomeController@index')->name('homepage');


Route::get('/login', function () {
    return view('login');
} )->middleware(['guest'])->name('login');

Route::get('/gest_utenti', 'UserController@index')->middleware(['auth'])->name('gest_utenti');


//gestione utenti
Route::get('/utente', 'UserController@create')->middleware(['auth'])->name('user.create');

Route::post('/utente', 'UserController@store')->middleware(['auth'])->name('user.store');

Route::get('/utente/{id}', 'UserController@edit')->middleware(['auth'])->name('user.edit');

Route::post('/utente/{id}/edit', 'UserController@update')->middleware(['auth'])->name('user.update');

Route::post('/utente/{id}/destroy', 'UserController@destroy')->middleware(['auth'])->name('user.destroy');

//gestione prodotti

Route::get('/gest_prodotti', 'ProductController@index')->middleware(['auth'])->name('gest_prodotti');

Route::get('/prodotto', 'ProductController@create')->middleware(['auth'])->name('product.create');

Route::post('/prodotto', 'ProductController@store')->middleware(['auth'])->name('product.store');

Route::get('/prodotto/{id}', 'ProductController@edit')->middleware(['auth'])->name('product.edit');

Route::post('/prodotto/{id}/edit', 'ProductController@update')->middleware(['auth'])->name('product.update');

Route::post('/prodotto/{id}/destroy', 'ProductController@destroy')->middleware(['auth'])->name('product.destroy');

require __DIR__.'/auth.php';

/*
Auth::routes();
*/
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
