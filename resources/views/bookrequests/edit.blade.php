@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update $bookrequest</div>
                 <div class="card-body">
                     <form action="{{route('bookrequests.update', $bookrequest->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         <label for="">User</label><br>
                         <select name="user_id" id="user_id" class="form-control">
                             @foreach($users as $user)
                               <option value="{{ $user->id}}" {{ $user->id == $bookrequest->user_id ? 'selected' : ''}}>{{$user->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Book</label><br>
                         <select name="book_id" id="book_id" class="form-control">
                             @foreach($books as $book)
                               <option value="{{ $book->id}}" {{ $book->id == $bookrequest->book_id ? 'selected' : ''}}>{{$book->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('Start Date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="start_date">Start Date</label>
                         <input type="text" name="start_date" value="{{$bookrequest->start_date}}" class="form-control @error('start_date') is-invalid @enderror "><br>

                         @error('End Date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="end_date">Start Date</label>
                         <input type="text" name="end_date" value="{{$bookrequest->end_date}}" class="form-control @error('end_date') is-invalid @enderror "><br>

                         @error('used')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="returned">Returned</label>
                         <input type="text" name="returned" value="{{$bookrequest->returned}}" class="form-control @error('returned') is-invalid @enderror "><br>

                         @error('status')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="status">Status</code>
                         <input type="text" name="status" value="{{$bookrequest->status}}" class="form-control @error('status') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">update </button>
                     </form>
           </div>
       </div>
   </div>
@endsection