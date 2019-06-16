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
Route::resource('/years','YearsController');
Route::resource('/news', 'NewsController');
Route::resource('/committees', 'CommitteesController');
Route::resource('/clubs', 'ClubsController');
Route::resource('/events', 'EventsController');
Route::resource('/tags', 'TagsController');
Route::resource('/organizers', 'OrganizersController');
Route::resource('/majors', 'MajorsController');
Route::resource('/events','EventsController');

// Route::get('/crud','CrudController@index');
// Route::get('/crud/{table}','CrudController@show');
// Route::get('/crud/{table}/create','CrudController@create');
// Route::post('/crud/{table}','CrudController@store');
// Route::delete('/crud/{table}/{id}','CrudController@delete');



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register','Auth\RegisterController@registerform');
