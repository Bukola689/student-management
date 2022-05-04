@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Notice Board</div>
                 <div class="card-body">
                     <form action="{{route('noticeboards.store')}}" method="POST">
                         @csrf
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="title">title</label>
                         <input type="text" name="title" class="form-control @error('title') is-invalid @enderror "><br>

                        @error('term')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description">Description</label><br>
                        <textarea name="description" id="" cols="" rows="10" width="80"></textarea><br><br>

                         @error('board_date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="board_date">Date</label>
                         <input type="date" name="board_date" class="form-control @error('board_date') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Create</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection