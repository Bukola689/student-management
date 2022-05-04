@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create subject</div>
                 <div class="card-body">
                     <form action="{{route('subjects.store')}}" method="POST">
                         @csrf

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>

                         @error('slug')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="slug">Slug</label>
                         <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror "><br>

                         <label for="">teacher</label><br>
                         <select name="teacher_id" id="teacher_id" class="form-control">
                             @foreach($teachers as $teacher)
                               <option value="{{ $teacher->id}}">{{$teacher->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}">{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Add Subject </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection