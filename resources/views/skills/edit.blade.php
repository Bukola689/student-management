@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update Skill</div>
                 <div class="card-body">
                     <form action="{{route('skills.update', $skill->id)}}" method="POST">
                         @csrf
                         @method('PUT');
                         
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$skill->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('skill type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="skill_type">Skill type</label>
                         <input type="text" name="skill_type" value="{{$skill->skill_type}}" class="form-control @error('skill_type') is-invalid @enderror "><br>

                        @error('class type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="class_type">Class type</label>
                         <input type="text" name="class_type" value="{{$skill->class_type}}" class="form-control @error('class_type') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Update </button>
                     </form>
           </div>
       </div>
   </div>
@endsection