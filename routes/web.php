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

Route::get('/', 'ProductController@index')->name('homepage');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/login', function () {
    return view('login');
} )->middleware(['guest'])->name('login');

Route::get('/gest_utenti', 'UserController@index')->middleware(['auth'])->name('gest_utenti');


//gestione utente
Route::get('/utente', 'UserController@create')->middleware(['auth'])->name('user.create');

Route::post('/utente', 'UserController@store')->middleware(['auth'])->name('user.store');

Route::get('/utente/{id}', 'UserController@edit')->middleware(['auth'])->name('user.edit');

Route::post('/utente/{id}', 'UserController@update')->middleware(['auth'])->name('user.update');

Route::post('/utente/{id}', 'UserController@destroy')->middleware(['auth'])->name('user.destroy');


/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
