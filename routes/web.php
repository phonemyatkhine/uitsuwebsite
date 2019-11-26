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

Route::get('/', 'PagesController@index');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/profile', 'UsersController@index')->name('profile');

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/create', 'NewsController@create')->name('news.create');
Route::post('/news/upload', 'NewsController@upload')->name('news.upload');
Route::post('/news/store', 'NewsController@store')->name('news.store');
Route::get('/news/v/{id}', 'NewsController@view')->name('news.view');
Route::get('/news/e/{id}', 'NewsController@edit')->name('news.edit');
Route::post('/news/update', 'NewsController@update')->name('news.update');
Route::post('/news/hide', 'NewsController@hide')->name('news.hide');
Route::post('/news/unhide', 'NewsController@unhide')->name('news.unhide');
Route::post('/news/delete', 'NewsController@delete')->name('news.delete');

Route::get('/insert-role', function () {
    $roles = json_decode(file_get_contents(base_path('resources/data/roles.json')), true);
    DB::table('roles')->delete();
    DB::statement('ALTER TABLE `roles` AUTO_INCREMENT=1;');
    foreach($roles as $role) {
        DB::table('roles')->insert([
            'name' => $role['name'],
            'level' => $role['level'],
            'description' => $role['description'],
            'standalone' => $role['standalone'],
        ]);
    }
});
Route::get('/insert-committee', function () {
    $committees = json_decode(file_get_contents(base_path('resources/data/committees.json')), true);
    DB::table('committees')->delete();
    DB::statement('ALTER TABLE `committees` AUTO_INCREMENT=1;');
    foreach($committees as $committee) {
        DB::table('committees')->insert([
            'name' => $committee['name'],
            'description' => $committee['description'],
        ]);
    }
});
Route::get('/insert-club', function () {
    $committees = json_decode(file_get_contents(base_path('resources/data/clubs.json')), true);
    DB::table('clubs')->delete();
    DB::statement('ALTER TABLE `clubs` AUTO_INCREMENT=1;');
    foreach($committees as $committee) {
        DB::table('clubs')->insert([
            'name' => $committee['name'],
            'description' => $committee['description'],
        ]);
    }
});