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
		// $table->time('create')->nullable();
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

Route::get('qb/update', function(){
	DB::table('users')->where('id', 1)->update(['name' => 'Mio', 'email' => 'mio@gmail.com']);
	echo 'updated';
});

Route::get('qb/delete', function(){
	DB::table('users')->where('id', 1)->delete();
	echo 'deleted';
});

Route::get('qb/truncate', function(){
	DB::table('users')->truncate(); 		// Xoá hết và reset các increment
	echo 'deleted';
});

// MODEL


Route::get('model/save', function(){
	$user = new App\User;
	$user->name = 'miku';
	$user->email = 'miku@gmail.com';
	$user->password = bcrypt('123');

	$user->save();

	echo 'saved';
});

Route::get('model/query', function(){
	$user = App\User::find(4);				//find(primary key)
	echo  $user->name;
});

Route::get('mdoel/category/save', function(){
	$cate = new App\Category;
	$cate->name = 'KinhDi';

	$cate->save();
});

Route::get('mdoel/category/save/{name}', function($name){
	$cate = new App\Category;
	$cate->name = $name;

	$cate->save();
});

Route::get('mdoel/category/all', function(){
	// $cate = App\Category::all();
	// $cate = App\Category::all()->toArray();
	$cate = App\Category::all()->toJson();

	echo $cate;
});

Route::get('mdoel/category/get', function(){
	$cate = App\Category::where('id', 1)->get()->toArray();

	echo $cate[0]['name'];
});


Route::get('mdoel/category/destroy', function(){
	$cate = App\Category::destroy(2);		//destroy(primary key)

});


// Liên kết table
Route::get('lienketBook', function(){
	$data = App\Book::find(3)->book->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";

	/**
	 * [id] => 3
	 * [name] => Haihuoc
	 */
	
});

Route::get('lienketCategory', function(){
	$data = App\Category::find(1)->category->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";

	/**
	 * [0] => Array
        (
            [id] => 1
            [name] => C
            [author] => linz
            [id_category] => 1
        )

     * [1] => Array
        (
            [id] => 2
            [name] => C++
            [author] => linz
            [id_category] => 1
        )
	 */
	
});

// MIDDLEWARE

Route::get('score', function(){
	echo 'Bạn đã đủ điểm';
})->middleware('MyMiddle')->name('score');

Route::get('error', function(){
	echo 'Bạn chưa đủ điểm';
})->name('error');

Route::get('enterScore', function(){
	return view('enterScore');
});


// AUTHENTICATE
Route::get('login', function(){
	return view('login');
});
Route::get('loginHack', function(){
	return view('index');
});
Route::post('checklogin', 'AuthController@login')->name('checklogin');
Route::get('logout', 'AuthController@logout');


// SESSION
Route::group(['middleware' => ['web']], function(){

	Route::get('session', function(){
		Session::put('course', 'laravel');

		Session::flash('author', 'linz');			// Truy xuất 1 lần rồi tự động xoá (có thể áp dụng đẻ show error)

		echo Session::get('course');
		echo Session::get('author');
		// echo session('course');



		// Session::forget('course');
		// Session::flush();				// Xoá tất cả các session

		if(Session::has('course'))
			echo '<br>exists';
		else
			echo '<br>not exists';
	});

	Route::get('getFlash', function(){
		echo Session::get('author');
	});


});


Route::get('listBook', 'BookController@index');

Route::get('thamsomacdinh/{id?}', function($id=1){
	return $id;
});

Route::get('check-view', function(){
	if(view()->exists('book')){
		return 'Exists';
	}else{
		return "Not Exists";
	}
});

Route::get('marquee', function(){
	return view('myView');
});

// MACRO
Route::get('response/macro/cap', function(){
	return response()->cap('hello mother fucker');
});

Route::get('response/macro/contact', function(){
	return response()->contact('/contact');
});

// Route::resource('hocsinh', 'HocSinhController');
Route::get('hocsinh/list', 'HocSinhController@list');

Route::get('hocsinh/create', 'HocSinhController@getCreate');
Route::post('hocsinh/create', 'HocSinhController@postCreate');

Route::get('hocsinh/destroy/{id}', 'HocSinhController@destroy');

Route::get('hocsinh/edit/{id}', 'HocSinhController@getEdit');
Route::get('hocsinh/edit/{id}', 'HocSinhController@postEdit');