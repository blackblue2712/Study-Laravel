<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $req){
    	$username = $req['username'];
    	$password = $req['password'];

    	// Đăng nhập với id cho trước
    	/* 
    		$user = User::find(2);
    		Auth::login($user);
    		return view('index', ['user' => Auth::user()]);
    	*/
    	
    	

    	if(Auth::attempt(['name' => $username, 'password' => $password]))
    		return view('index', ['user' => Auth::user()]);
    	else
    		return view('login', ['error' => 'Login fail']);
    }

    public function logout(){
    	Auth::logout();
    	return view('login');
    }
}
