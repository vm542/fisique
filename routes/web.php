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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/problemes/{theme}', 'SubthemesController@index')->name('subthemes');
Route::get('/problemes/{theme}/{subtheme}', 'ProblemsController@index')->name('problems');
Route::get('/problemes/{theme}/{subtheme}/{id}', 'ProblemController@index')->name('problem');
Route::post('/problemes/{theme}/{subtheme}/{id}/check', 'ProblemController@check')->name('check-problem');

Route::get('/theories/{name}', 'TheoriesController@index')->name('theories');
Route::get('/theories/{name}/{id}', 'TheoryController@index')->name('theory');

Route::get('/forum', 'ForumController@index')->name('forum');

Route::get('/profil', 'ProfileController@index')->name('profile');

Route::get('/parametres', 'SettingsController@index')->name('settings');

Route::get('/themes', 'ThemesController@index')->name('themes');
Route::post('/themes/add', 'ThemesController@add')->name('add-theme');
Route::post('/subthemes/add', 'SubthemesController@add')->name('add-subtheme');
Route::post('/problems/add', 'ProblemController@add')->name('add-problem');

Route::get('/', function(){
    return view('home');
});