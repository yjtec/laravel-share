<?php
Route::put('/share/{share}','ShareController@update');//修改分享内容
Route::post('/share', 'ShareController@store'); //设置分享内容
Route::get('/share', 'ShareController@index'); //获取jsapi参数
Route::get('/share/search','ShareController@search');//获取分享的内容


