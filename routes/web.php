<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Auth::routes(['register' => false]);


Route::get('/', 'Front@index')->name('home-page');
Route::post('/add-entry', 'Entry@store')->name('add-entry');
Route::get('/edit-entry/{id}', 'Entry@show')->name('show-entry');
Route::post('/update-entry/{id}', 'Entry@update')->name('update-entry');
Route::delete('/delete-entry/{id}', 'Entry@destroy')->name('delete-entry');
Route::get('/home/{id?}', 'HomeController@index')->name('admin-home');
