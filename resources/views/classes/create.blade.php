@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Lga</div>
                 <div class="card-body">
                     <form action="{{route('classes.store')}}" method="POST">
                         @csrf

                         <label for="">Class Type</label><br>
                         <select name="class_type_id" id="class_type_id" class="form-control">
                             @foreach($classtypes as $classtype)
                               <option value="{{ $classtype->id}}">{{$classtype->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection