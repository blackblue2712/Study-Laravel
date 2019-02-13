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


}
