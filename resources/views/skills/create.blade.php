@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Dorm</div>
                 <div class="card-body">
                     <form action="{{route('skills.store')}}" method="POST">
                         @csrf
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('skill type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="skill_type">Skill type</label>
                         <input type="text" name="skill_type" class="form-control @error('skill_type') is-invalid @enderror "><br>

                        @error('class type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="class_type">Class type</label>
                         <input type="text" name="class_type" class="form-control @error('class_type') is-invalid @enderror "><br>
                     
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create Dorm</button>
                     </form>
           </div>
       </div>
   </div>
@endsection