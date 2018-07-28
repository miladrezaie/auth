<?php



//Route::get('/','PanelController@index');
//Route::get('/post/{post}','PanelController@single')->name('post.single');


Auth::routes();

Route::get('login/laravelweb','Auth\LoginController@loginWithlaravelweb');
Route::get('/callback','Auth\LoginController@loginCallback');

Route::get('/home', 'HomeController@index')->name('home');
