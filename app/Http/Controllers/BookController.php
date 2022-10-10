<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    // All Books
    public function index() {

        $books = Book::orderBy('id', 'DESC')->paginate(3);

        return view('books/indexPage', [
            'books' => $books
        ]);

    }

    // Show Specific Book
    public function show($id) {
        $book = Book::find($id);

        return view('books.show', [
            'book' => $book
        ]);
    }

    // Create
    public function create() {
        $authors = Author::select('id', 'name')->get();

        return view('books/create', [
            'authors' => $authors
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
            'price' => 'required|numeric|max:999999.99',
            'author_id' => 'required|exists:authors,id'
        ]);

        
        $img = $request->img;
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . ".$ext";
        $img->move( public_path('uploads') , $name);

        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $name,
            'price' => $request->price,
            'author_id' => $request->author_id,
        ]);

        return redirect( route('allBooks') );
    }

    //Update
    public function edit($id) {
        $book = Book::find($id);
        $authors = Author::select('id', 'name')->get();
        
        return view('books/edit', [
            'book' => $book,
            'authors' => $authors 
        ]);
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
            'price' => 'required|numeric|max:999999.99',
            'author_id' => 'required|exists:authors,id'
        ]);

        $book = Book::find($id);
        $name = $book->img;

        if($request->hasFile('img')) {

            // Delete The Old
            if($name!==null)
                unlink( public_path("uploads/$name") );
            
            // Upload The New
            $img = $request->img;
            $ext = $img->getClientOriginalExtension();
            $name = "author-" . uniqid() . ".$ext";
            $img->move( public_path('uploads') , $name);
            
        }

        // $name = $request->name;
        // $bio = $request->bio;

        $book->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $name,
            'price' => $request->price,
            'author_id' => $request->author_id,
        ]);

        return back();
    }

    // Delete
    
    public function delete($id) {

        $book = Book::find($id);

        $name = $book->img;
        if($name !== null)
            unlink( public_path("uploads/$name") );

        $book->delete();

        return back();
        
    }
}
