@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Book</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">New Books</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Description</th>
            <th scope="col">Author</th>
            <th scope="col">Book type</th>
            <th scope="col">url</th>
            <th scope="col">location</th>
            <th scope="col">total copies</th>
            <th scope="col">issued copies</th>
            <th scope="col">Action</th>
         </tr>
          </thead>
             <tbody>
                @foreach($books as $book)
              <tr>
                  <td>{{$book->id}}</td>
                  <td>{{$book->name}}</td>
                  <td>{{$book->my_class->name}}</td>
                  <td>{{$book->description}}</td>
                  <td>{{$book->author}}</td>
                  <td>{{$book->book_type}}</td>
                  <td>{{$book->url}}</td>
                  <td>{{$book->location}}</td>
                  <td>{{$book->total_copies}}</td>
                  <td>{{$book->issued_copies}}</td>
                  <td><a href="{{route('books.edit', $book->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('books.destroy', $book->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </td>
              </tr>
               @endforeach
               </tbody>
           </table>
         </div>   
       </div>
@endsection
