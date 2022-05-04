@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create States</div>
                 <div class="card-body">
                     <form action="{{route('states.store')}}" method="POST">
                         @csrf

                         <label for="">lga</label><br>
                         <select name="lga_id" id="lga_id" class="form-control">
                             @foreach($lgas as $lga)
                               <option value="{{ $lga->id}}">{{$lga->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>
                        <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create State</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection