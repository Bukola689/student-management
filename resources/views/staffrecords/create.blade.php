@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Staff</div>
                 <div class="card-body">
                     <form action="{{route('staffrecords.store')}}" method="POST">
                         @csrf

                         <label for="">User</label><br>
                         <select name="user_id" id="user_id" class="form-control">
                             @foreach($users as $user)
                               <option value="{{ $user->id}}">{{$user->name}}</opn>
                             @endforeach
                         </select>
                         <br>
                     
                        @error('code')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="code">Code</label>
                         <input type="text" name="code" class="form-control @error('code') is-invalid @enderror "><br>

                         @error('emp date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="emp date">Emp Date</label>
                         <input type="date" name="emp_date" class="form-control @error('emp_date') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create Staff record</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection