@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit User</div>
                 <div class="card-body">
                     <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')

                         @error('photo')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="photo">Photo</label>
                         <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror "><br>
                        
                         <img src="{{ asset($user->photo) }}" alt="" width="60"  height="70"><br><br>

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror "><br>     

                         @error('email')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="email">Email</label>
                         <input type="email" name="email"  value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror "><br>

                         @error('Password')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="password">Password</label>
                         <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Create User</button>
                     </form>
                 </div>
           </div>
       </div>
@endsection