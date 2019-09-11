<?php

/*

*/

Route::get('/', 'PagesController@home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'PagesController@contact')->middleware('auth');
Route::get('/about','PagesController@about')->middleware('auth');


Route::resource('projects','ProjectsController')->middleware('auth');
/* 入ってる↑
Route::get('/projects','ProjectsController@index');
Route::get('/projects/create','ProjectsController@create');
Route::post('/projects','ProjectsController@store');
Route::get('/projects/{project}','projectsController@edit');
Route::patch('/projects/{project}','projectsController@update');
Route::get('/projects/{project}','projectsController@delete');
*/
Route::resource('tasks','ProjectTasksController')->middleware('auth');

//->middileware('can:update,project')
//これでpolicyに飛んで、チェックが入る。

//guestは４０４エラーになる。authはログイン画面に飛ぶ
