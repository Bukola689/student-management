@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Dorm</div>
                 <div class="card-body">
                     <form action="{{route('dorms.update', $dorm->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$dorm->name}}" class="form-control @error('dorm') is-invalid @enderror "><br>

                        @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description">Description</label>
                         <input type="text" name="description" value="{{$dorm->description}}" class="form-control @error('description') is-invalid @enderror "><br>
                        <br><br>

                        <button type="submit" class="btn btn-primary btn-sm">Update Dorm</button>
                       </form>
                
           </div>
       </div>
   </div>
@endsection
      