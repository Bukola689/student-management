@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Setting</div>
                 <div class="card-body">
                     <form action="{{route('settings.store')}}" method="POST">
                         @csrf
                         @error('type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="type">Name</label>
                         <input type="text" name="type" class="form-control @error('type') is-invalid @enderror "><br>

                        @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description">Description</label>
                         <input type="text" name="description" class="form-control @error('description') is-invalid @enderror "><br>
                        <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create description</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection