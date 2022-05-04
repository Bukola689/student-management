@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Exam</div>
                 <div class="card-body">
                     <form action="{{route('exams.store')}}" method="POST">
                         @csrf
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('term')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="term">Term</label>
                         <input type="text" name="term" class="form-control @error('term') is-invalid @enderror "><br>

                         @error('year')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="year">Year</label>
                         <input type="text" name="year" class="form-control @error('year') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Create Book</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection