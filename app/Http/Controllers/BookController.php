<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    //
    public function index(){
    	
    	$listBook = Book::where('id', '>', 12)->paginate(3);
    	// $listBook = Book::where('id', '>', 12)->paginate(3)->setPath('sexualBook/book');		// Cấu hình lại path
    	// $listBook = Book::where('id', '>', 12)->simplePaginate(3); 		//Chỉ có 2 dấu arrow left và right
    	
    	return view('book', ['listBook' => $listBook]);
    }
}
