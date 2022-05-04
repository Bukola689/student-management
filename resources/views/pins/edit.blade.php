@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update Pin</div>
                 <div class="card-body">
                     <form action="{{route('pins.update', $pin->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('code')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="code">code</label>
                         <input type="text" name="code" value="{{$pin->code}}" class="form-control @error('code') is-invalid @enderror "><br>

                         @error('used')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="used">Used</code>
                         <input type="text" name="used" value="{{$pin->used}}" class="form-control @error('used') is-invalid @enderror "><br>

                         @error('times used')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="time used">Time Used</code>
                         <input type="text" name="times_used" value="{{$pin->times_used}}" class="form-control @error('times_used') is-invalid @enderror "><br>

                         <label for="">User</label><br>
                         <select name="user_id" id="user_id" class="form-control">
                             @foreach($users as $user)
                               <option value="{{ $user->id}}"  {{$user->id == $pin->user_id ? 'selected' : ''}}>{{$user->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Student</label><br>
                         <select name="student_id" id="student_id" class="form-control">
                             @foreach($students as $student)
                               <option value="{{ $student->id}}"  {{$student->id == $pin->student_id ? 'selected' : ''}}>{{$student->name}}</option>
                             @endforeach
                         </select>
                         <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm"> PIN </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection