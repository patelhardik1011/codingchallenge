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
Route::get('/create-todo', 'HomeController@createTodo')->name('create-todo');
Route::get('/edit-todo/{id}', 'HomeController@editTodo')->name('edit-todo');
Route::post('/add-todo', 'HomeController@addTodo')->name('add-todo');
Route::get('/complete-todo/{id}', 'HomeController@completeTodo')->name('complete-todo');
Route::get('/delete-todo/{id}', 'HomeController@deleteTodo')->name('delete-todo');
