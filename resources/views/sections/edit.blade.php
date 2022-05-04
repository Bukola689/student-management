@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Section</div>
                 <div class="card-body">
                     <form action="{{route('sections.update', $section->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$section->name}}"  class="form-control @error('name') is-invalid @enderror "><br>

                       

                        <label for="">Teacher</label><br>
                         <select name="teacher_id" id="teacher_id" class="form-control">
                             @foreach($teachers as $teacher)
                               <option value="{{ $teacher->id }}" {{  $teacher->id == $section->teacher_id ? 'selected' : '' }}>{{$teacher->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id }}" {{  $myclass->id == $section->my_class_id ? 'selected' : '' }}>{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('active')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="active">Active</label>
                         <input type="text" name="active" value="{{$section->active}}" class="form-control @error('slug') is-invalid @enderror "><br>

                        <button type="submit" class="btn btn-primary btn-sm">Update Lga</button>
                       </form>
                
           </div>
       </div>
   </div>
@endsection
      