@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Setting</div>
                 <div class="card-body">
                     <form action="{{route('settings.update', $setting->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="type">Type</label>
                         <input type="text" name="type" value="{{$setting->type}}" class="form-control @error('setting') is-invalid @enderror "><br>

                        @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description">Description</label>
                         <input type="text" name="description" value="{{$setting->description}}" class="form-control @error('description') is-invalid @enderror "><br>
                        <br><br>

                        <button type="submit" class="btn btn-primary btn-sm">Update State</button>
                       </form>
                
           </div>
       </div>
   </div>
@endsection
      