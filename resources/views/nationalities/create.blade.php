@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Nationality</div>
                 <div class="card-body">
                     <form action="{{route('nationalities.store')}}" method="POST">
                         @csrf
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>
                        <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create Nationality</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection