@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Book</div>
                 <div class="card-body">
                     <form action="{{route('exams.update', $exam->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$exam->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('term')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="term">Term</label>
                         <input type="text" name="term" value="{{$exam->term}}" class="form-control @error('term') is-invalid @enderror "><br>

                        @error('year')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="year"> Year</label>
                         <input type="text" name="year" value="{{$exam->year}}" class="form-control @error('year') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm"> Exam</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection