@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Lga</div>
                 <div class="card-body">
                     <form action="{{route('lgas.update', $lga->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$lga->name}}" class="form-control @error('name') is-invalid @enderror "><br>
                        <br>

                        <button type="submit" class="btn btn-primary btn-sm">Update Lga</button>
                       </form>
                
           </div>
       </div>
   </div>
@endsection
      