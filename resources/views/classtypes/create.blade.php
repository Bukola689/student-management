@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Classtype</div>
                 <div class="card-body">
                     <form action="{{route('classtypes.store')}}" method="POST">
                         @csrf
                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>

                        @error('code')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="code">Code</label>
                         <input type="text" name="code" class="form-control @error('code') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create Classtype</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection