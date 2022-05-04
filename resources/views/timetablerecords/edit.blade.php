@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update Timestablerecord</div>
                 <div class="card-body">
                     <form action="{{route('timetablerecords.update', $timetablerecord->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{ $timetablerecord->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}" {{ $myclass->id == $timetablerecord->myclass_id ? 'selected' : ''}}>{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Class</label><br>
                         <select name="exam_id" id="exam_id" class="form-control">
                             @foreach($exams as $exam)
                               <option value="{{ $exam->id}}" {{ $exam->id == $timetablerecord->exam_id ? 'selected' : ''}}>{{$exam->name}}</option>
                             @endforeach
                         </select>
                         <br>
                        
                         @error('year')
                         <div class="alert alert-dange">{{ $message }}</div>
                         @enderror
                         <label for="year">Year</label>
                         <input type="text" name="year" value="{{ $timetablerecord->year}}" class="form-control @error('year') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Update TimestableRecord </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection