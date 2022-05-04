@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Book</div>
                 <div class="card-body">
                     <form action="{{route('books.update', $book->id)}}" method="POST">
                         @csrf
                         @method('PUT')
                         
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$book->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                         <label for="">Class</label>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}" {{ $myclass->id == $book->my_class_id ? 'selected' : ''}}>{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                        @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description"> Description</label>
                         <input type="text" name="description" value="{{$book->description}}" class="form-control @error('description') is-invalid @enderror "><br>

                        @error('author')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="author">Author</label>
                         <input type="text" name="author" value="{{$book->author}}" class="form-control @error('author') is-invalid @enderror "><br>

                        @error('book type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="book_type">Book Type</label>
                         <input type="text" name="book_type" value="{{$book->book_type}}" class="form-control @error('book_type') is-invalid @enderror "><br>

                        @error('url')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="url">Url</label>
                         <input type="text" name="url" value="{{$book->url}}" class="form-control @error('url') is-invalid @enderror "><br>

                        @error('url')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="locstion">Location</label>
                         <input type="text" name="location" value="{{$book->location}}" class="form-control @error('location') is-invalid @enderror "><br>

                         @error('total cpoies')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="total_copies">Total Copies</label> 
                         <input type="text" name="total_copies" value="{{$book->total_copies}}" class="form-control @error('total_copies') is-invalid @enderror "><br>
                        
                         @error('issue_copies')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="copies">Issued Copied</label>
                         <input type="text" name="issued_copies" value="{{$book->issued_copies}}" class="form-control @error('issued_copies') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create Book</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection