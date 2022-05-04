<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\MyClass;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $books = Book::all();

       // dd($books);

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myclasses = MyClass::all();

        return view('books.create')->with('myclasses', $myclasses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => new Uppercase,
            'my_class_id' => 'required',
            'description' => 'required',
            'author' => 'required',
            'book_type' => 'required',
            'url' => 'required',
            'location' => 'required',
            'total_copies' => 'required',
            'issued_copies' => 'required',
        ]);

        $book = new Book;
        $book->name = $request->input('name');
        $book->my_class_id = $request->input('my_class_id');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->book_type = $request->input('book_type');
        $book->url = $request->input('url');
        $book->location = $request->input('location');
        $book->total_copies = $request->input('total_copies');
        $book->issued_copies = $request->input('issued_copies');
        $book->save();

        return redirect(route('books.index'))->with('success', 'Books Created Successfully !');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $book = Book::find($id);

        $myclasses = MyClass::all();

        return view('books.edit')->with('book', $book)->with('myclasses', $myclasses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'my_class_id' => 'required',
            'description' => 'required',
            'author' => 'required',
            'book_type' => 'required',
            'url' => 'required',
            'location' => 'required',
            'total_copies' => 'required',
            'issued_copies' => 'required',
        ]);

        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->my_class_id = $request->input('my_class_id');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->book_type = $request->input('book_type');
        $book->url = $request->input('url');
        $book->location = $request->input('location');
        $book->total_copies = $request->input('total_copies');
        $book->issued_copies = $request->input('issued_copies');
        $book->save();

        return redirect(route('books.index'))->with('success', 'Books Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect(route('books.index'))->with('error', 'Book Deleted Successfully !');
    }
}
