@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Classtype</div>
                 <div class="card-body">
                     <form action="{{route('classtypes.update', $classtype->id)}}" method="POST">
                         @csrf
                         @method('PUT')
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$classtype->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('code')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="code">Name</label>
                         <input type="text" name="code" value="{{$classtype->code}}" class="form-control @error('code') is-invalid @enderror "><br>
                        

                        <button type="submit" class="btn btn-primary btn-sm">Update Class</button>
                       </form>
                
           </div>
       </div>
   </div>
@endsection
      