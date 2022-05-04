@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Lga</div>
                 <div class="card-body">
                     <form action="{{route('bookrequests.store')}}" method="POST">
                         @csrf

                         <label for="">User</label><br>
                         <select name="user_id" id="user_id" class="form-control">
                             @foreach($users as $user)
                               <option value="{{ $user->id}}">{{$user->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Book</label><br>
                         <select name="book_id" id="book_id" class="form-control">
                             @foreach($books as $book)
                               <option value="{{ $book->id}}">{{$book->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('Start Date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="start_date">Start Date</label>
                         <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror "><br>

                         @error('End Date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="end_date">Start Date</label>
                         <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror "><br>

                         @error('returned')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="returned">Returned</code>
                         <input type="text" name="returned" class="form-control @error('returned') is-invalid @enderror "><br>

                         @error('status')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="status">Status</code>
                         <input type="text" name="status" class="form-control @error('status') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection