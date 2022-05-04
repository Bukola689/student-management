<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $bookrequests = BookRequest::all();

       // dd($bookrequests);

        return view('bookrequests.index')->with('bookrequests', $bookrequests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();

        $users = User::all();

        return view('bookrequests.create')->with('books', $books)->with('users', $users);
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
            'user_id' => 'required',
            'book_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'returned' => 'required',
            'status' => 'required',
        ]);

        $bookrequest = new BookRequest;
        $bookrequest->book_id = $request->input('book_id');
        $bookrequest->user_id = $request->input('user_id');
        $bookrequest->start_date = $request->input('start_date');
        $bookrequest->end_date = $request->input('end_date');
        $bookrequest->returned = $request->input('returned');
        $bookrequest->status = $request->input('status');
        $bookrequest->save();

        return redirect(route('bookrequests.index'))->with('success', 'Bookrequests Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookRequest  $bookRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BookRequest $bookRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookRequest  $bookRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookrequest = BookRequest::find($id);

        $books = Book::all();

        $users = User::all();

        return view('bookrequests.edit')->with('bookrequest', $bookrequest)
                                        ->with('books', $books)
                                        ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookRequest  $bookRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'returned' => 'required',
            'status' => 'required',
        ]);

        $bookrequest = BookRequest::find($id);
        $bookrequest->book_id = $request->input('book_id');
        $bookrequest->user_id = $request->input('user_id');
        $bookrequest->start_date = $request->input('start_date');
        $bookrequest->end_date = $request->input('end_date');
        $bookrequest->returned = $request->input('returned');
        $bookrequest->status = $request->input('status');
        $bookrequest->save();

        return redirect(route('bookrequests.index'))->with('success', 'Bookrequests Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookRequest  $bookRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookrequest = BookRequest::find($id);

        $bookrequest->delete();

        return redirect(route('bookrequests.index'))->with('success', 'Bookrequests Deleted Successfully !');
    }
}
