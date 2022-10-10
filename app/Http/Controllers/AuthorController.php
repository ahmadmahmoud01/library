<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function index() {
        // SELECT * FROM authors
        $authors = Author::orderBy('id', 'DESC')->paginate(3);

        // SELECT name, bio FROM authorsWHERE id > 2 ORDER BY id ASC LIMIT 2
        // $authors2 = Author::select('name', 'bio')
        //         ->where('id', '>', '2')
        //         ->orderBy('id', 'ASC')
        //         ->take(2)
        //         ->get();

        return view('authors/indexPage', [
        
        'authors' => $authors

        ]);
    }

    ///////////////////////////////////
    public function latest() {
        $authors = Author::orderBy('id', 'DESC')
                ->take(3)
                ->get();
        return view('latestAuthor', [
            'authors' => $authors
        ]);
        //dd($authors);
    }

    //////////////////////////////////
    public function show($id) {

        // Call The Model To Fetch Specific Author
        $author = Author::find($id);
        
        return view('authors.show', [
            'author' => $author
        ]);
    }

    ////////////////////////////////
    public function search($word) {
        $author = Author::where('name', 'LIKE', "%$word%")->get();

        return view('authors/search', [
            'author' => $author
        ]);
    }
    //////////////////////////////
    // Create
    public function create() {
        return view('authors/create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        //$name = $request->name;
        //$bio = $request->bio;

        $img = $request->img;
        $ext = $img->getClientOriginalExtension();
        $name = "author-" . uniqid() . ".$ext";
        $img->move( public_path('uploads'), $name );

        Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'img' => $name
        ]);

        return redirect( route('allAuthors') );
    }
    /////////////////////////////////
    //Update
    public function edit($id) {
        $author = Author::find($id);
        
        return view('authors/edit', [
            'author' => $author 
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $author = Author::find($id);
        $name = $author->img;

        if($request->hasFile('img')) {
            if($author->img !== null) {
            // Delete The Old
            unlink( public_path("uploads/$name") );
            }

            // Add The New
            $img = $request->img;
            $ext = $img->getClientOriginalExtension();
            $name = "author-" . uniqid() . ".$ext";
            $img->move( public_path('uploads'), $name );
            
        }

        //$name = $request->name;
        //$bio = $request->bio;

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'img' => $name
        ]);

        return back();
    }
    ///////////////////////////////
    // Delete
    
    public function delete($id) {

        $author = Author::find($id);
        $name = $author->img;
        unlink( public_path("uploads/$name") );

        $author->delete();

        return back();
        
    }

}
