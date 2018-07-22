<?php



Route::get('/','PanelController@index');
Route::get('/post/{post}','PanelController@single')->name('post.single');