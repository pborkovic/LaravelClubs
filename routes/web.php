<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('clubs', 'App\Http\Controllers\ClubController@index')->name('index');

//Create New Club
Route::get('clubs/create', 'App\Http\Controllers\ClubController@create')->name('clubs.create');
Route::post('clubs', 'App\Http\Controllers\ClubController@store')->name('clubs.store');

//Update a Club
Route::patch('clubs/update/{club}', 'App\Http\Controllers\ClubController@update')->name('clubs.update');
Route::get('clubs/edit/{club}', 'App\Http\Controllers\ClubController@edit')->name('clubs.edit');

//Show a Club
Route::get('clubs/show/{club}', 'App\Http\Controllers\ClubController@show')->name('clubs.show');

//Destory Club
Route::delete('clubs/delete/{club}', 'App\Http\Controllers\ClubController@destroy')->name('clubs.destroy');

//Search club
Route::get('/search', 'App\Http\Controllers\ClubController@search')->name('clubs.search');

//Error view redirection
Route::view('error', 'error')->name('error');

//Sum
Route::view('/sum', 'clubs.sumOfCurrValue')->name('clubs.show.sum');
Route::get('/sum/show', 'App\Http\Controllers\ClubController@calculateSum')->name('club.sum-build');


Route::get('/', 'App\Http\Controllers\BookController@index')->name('clubs.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('books/create', 'App\Http\Controllers\BookController@create')->name('books.create')->middleware('auth');

