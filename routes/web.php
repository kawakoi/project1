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


Route::redirect('/', 'blog');

Auth::routes();

//Esta ruta la ponemos en la raiz para que nada mas ejecutar nuestra aplicación aparezca nuestro formulario

/*
Route::get('/', function () {
    return view('test');
});
*/

//Contacto

Route::post('contacto',        'Web\PageController@contact')->name('contact');

//web
Route::get('blog',             'Web\PageController@blog')->name('blog');
Route::get('usuario/{id}',     'Web\PageController@user')->name('user');
Route::get('entrada/{slug}',   'Web\PageController@post')->name('post');
Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');
Route::get('etiqueta/{slug}',  'Web\PageController@tag')->name('tag');

//admin
Route::resource('contact',     'Web\ContactController');

Route::resource('users',        'Admin\UserController');
Route::resource('tags',         'Admin\TagController');
Route::resource('categories',   'Admin\CategoryController');
Route::resource('posts',        'Admin\PostController');

//Route::resource('contacto',    'EmailController@contact')->name('contact');
//Ruta que esta señalando nuestro formulario