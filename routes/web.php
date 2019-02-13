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


Route::get('begin', function(){
	return 'Hello World';
});

Route::get('begin/laravel', function(){
	echo '<h1>Hello MyLaravel</h1>';
});

Route::get('hello/{name}', function($name){
	echo '<h1>Hello '.$name.'</h1>';
});

Route::get('today/{day}', function($day){
	echo '<h1>Today is '.$day.'</h1>';
})->where(['day' => '[0-9]+']);

Route::get('user/{id}/{name}', function($id,$name){
	echo ("id: $id - name: $name");
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

// Định danh
Route::get('todo', function(){
	return 'Redrect from callmr1 route';	
})->name('mr1');

Route::get('callmr1', function(){
	return redirect()->route('mr1');
});

//Group
Route::prefix('mgroup')->group(function(){
	Route::get('users1', function () {
        // Matches The "/mgroup/users1" URL
        echo 'user1';
    });
    Route::get('users2', function () {
        // Matches The "/mgroup/users2" URL
        echo 'user2';
    });
    Route::get('users3', function () {
        // Matches The "/mgroup/users3" URL
        echo 'user3';
    });
});

// Controller

Route::get('callController', 'Mycontroller@hello');

Route::get('callController2/{name}', 'Mycontroller@hello2');

//Request
Route::get('myRequest', 'MyController@getURL');

// Gửi dữ liệu với request
Route::get('getForm', function(){
	return view('postForm');
});

// Route::post('postForm', ['as' => 'postForm', 'uses' => 'MyController@postForm']);

Route::post('postForm', 'MyController@postForm')->name('postForm');

// Cookie
Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');