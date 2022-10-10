<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;

class ApiBookController extends Controller
{
    public function index() {

        $books = Book::get();

        return response()->json($books);

    }
}
