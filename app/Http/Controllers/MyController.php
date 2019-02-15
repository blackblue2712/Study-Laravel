<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class MyController extends Controller
{
    public function hello(){
    	echo 'Hello, I just call controller';
    }

    public function hello2($name){
    	echo "Hello $name";
    	return redirect()->route('mr1');
    }

    public function getURL(Request $req){
    	// return $req->path();		// myRequest
    	// return $req->url();			// http://localhost/MyLaravel/public/myRequest

    	// if($req->isMethod('get')) 	// Kiểm tra xem route đang gọi phương thức get?
    	// 	echo 'true';
    	// else
    	// 	echo 'false';

    	if($req->is('myRequest')) 	// true (Kiểm tra path)
    		echo 'true';
    	else
    		echo 'false';
    }

    public function postForm(Request $req){
    	echo $req->name;
    }

    public function setCookie(){
    	$res = new Response();
    	$res->withCookie('course', 'laravel', 1); // name - value - time (minutes)
    	echo 'setted Cookie';
    }

    public function getCookie(Request $req){
    	echo $req->cookie('course');
    	echo 'getted Cookie';
    	return $req->cookie('course');
    }

    public function postFile(Request $req){
    	if( $req->hasFile('myFile') ){
    		$file = $req->file('myFile');
    		if( $file->getClientOriginalExtension('myFile') == 'jpg' ){
    			$filename = $file->getClientOriginalName('myFile');
    			$file->move('img', $filename); 		// destination (public/) - FileName	
    			echo $filename;
    		}else{
    			echo 'fail';
    		}
    		
    	}else{
    		echo 'not has';
    	}
    }

    public function getJson(){
    	$json_arr = ['course' => 'laravel'];
    	
    	return Response()->json($json_arr);
    }

    public function myView(){
    	return view('mview.index');
    }

    public function time($t){
    	return view('time', ['time' => $t]); // Truyền biến t qua view
    }

    public function blade($str){
    	$author = '<b>BlackBlue</b>';
    	if($str == 'laravel')
    		return view('pages.laravel', ['author' => $author]);
    	if($str == 'php')
    		return view('pages.php', ['author' => $author]);
    }
}





