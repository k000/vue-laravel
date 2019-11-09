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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/note/create','NoteController@create');
Route::get('/notes','NoteController@getList');
Route::get('/note','NoteController@getNote');
Route::patch('/note/update','NoteController@updateNote');
Route::delete('/note/delete','NoteController@deleteNote');
Route::get('/note/search','NoteController@searchNote');