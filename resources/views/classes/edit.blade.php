@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Classes</div>
                 <div class="card-body">
                     <form action="{{route('classes.update', $myclass->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$myclass->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                        <label for="">class type</label><br>
                         <select name="class_type_id" id="class_type_id" class="form-control">
                             @foreach($classtypes as $classtype)
                               <option value="{{ $classtype->id }}" {{  $classtype->id == $myclass->class_type_id ? 'selected' : '' }}>{{$classtype->name}}</option>
                             @endforeach
                         </select>
                         <br>

                        <button type="submit" class="btn btn-primary btn-sm">Update Lga</button>
                       </form>
                
           </div>
       </div>
   </div>
@endsection
      