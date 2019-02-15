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

// Uplpoad file
Route::get('uploadFile', function(){
	return view('postFile');
});

// PHẢI ĐẶT ĐỊNH DANH MỚI GỌI BÊN FORM ĐƯỢC
Route::post('postFile', 'MyController@postFile')->name('postFile');

// JSON
Route::get('getJson', 'MyController@getJson');

// View
Route::get('myView', 'MyController@myView');

// Route::get('myView', function(){
// 	return view('myView');
// });

Route::get('time/{t}', 'MyController@time');
// Truyền tham số cho TẤT CẢ view 
View::share('course', 'Laravel');

// Blade Template
Route::get('blade', function(){
	return view('pages.php');
});

Route::get('bladeTemplate/{str}', 'MyController@blade');

// Database
Route::get('database', function(){
	Schema::create('book', function($table){
		$table->increments('id');
		$table->string('name', 50);
		$table->string('author')->default('linz');
		$table->time('create')->nullable();
		$table->integer('id_book')->unsigned();
		$table->foreign('id_book')->references('id')->on('category');
	});
	echo "Created";
});

Route::get('createCate', function(){
	Schema::create('category', function($table){
		$table->increments('id');
		$table->string('name', 50);
	});
	echo "Category Created";
});

// Route::get('rename', function(){
// 	Schema::rename('book')
// });

Route::get('dropCol', function(){
	Schema::table('book', function($table){
		$table->dropColumn('create');
	});
});

Route::get('addCol', function(){
	Schema::table('book', function($table){
		$table->date('created');
	});
	echo 'Inserted';
});

// Route::get('deleteCol', function(){
// 	Schema::drop('book');
// });

Route::get('deleteCol', function(){
	Schema::dropIfExists('book');
});

// QUERY BUIDER

Route::get('qb/get', function(){
	$data = DB::table('users')->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.' - '.$value .'||';
		}
		echo '<hr />';
	}
});

Route::get('qb/where', function(){
	$data = DB::table('users')->where('id', '=', 2)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.' - '.$value .'||';
		}
		echo '<hr />';
	}
});

Route::get('qb/select', function(){
	$data = DB::table('users')->select(['id', 'name', 'email'])->where('id', '=', 2)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.' - '.$value .'||';
		}
		echo '<hr />';
	}
});

Route::get('qb/raw', function(){
	$data = DB::table('users')->select( 'id', DB::raw('name as fuckingname'), 'email' )->where('id', '=', 2)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.' - '.$value .'||';
		}
		echo '<hr />';
	}
});

Route::get('qb/orderBy', function(){
	$data = DB::table('users')->select( 'id', DB::raw('name as fuckingname'), 'email' )->where('id', '>', 1)->orderBy('id', 'desc')->skip(1)->take(5)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.' - '.$value .'||';
		}
		echo '<hr />';
	}
});