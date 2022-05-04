@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Dorm</div>
                 <div class="card-body">
                     <form action="{{route('dorms.store')}}" method="POST">
                         @csrf
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description">Description</label>
                         <input type="text" name="description" class="form-control @error('description') is-invalid @enderror "><br>
                        <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create Dorm</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection