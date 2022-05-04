@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Profile</div>
                 <div class="card-body">
                     <form action="{{route('profiles.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method("PUT")

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror "><br>     

                         @error('email')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="email">Email</label>
                         <input type="email" name="email"  value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror "><br>

                         @error('username')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="username">Username</label>
                         <input type="text" name="username"  value="{{Auth::user()->username}}" class="form-control @error('username') is-invalid @enderror "><br>

                         @error('dob')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="dob">DOB</label>
                         <input type="date" name="dob"  value="{{Auth::user()->dob}}" class="form-control @error('dob') is-invalid @enderror "><br><br>

                         @error('gender')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="gender">Gender</label>
                         <select name="gender" id="" value="{{Auth::user()->gender}}">
                             <option value="male">Male</option>
                             <option value="female">Female</option>
                         </select><br><br>

                         @error('phone')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="phone">Phone</label>
                         <input type="text" name="phone"  value="{{Auth::user()->phone}}" class="form-control @error('phone') is-invalid @enderror "><br>

                         @error('phone2')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="phone2">Phone 2</label>
                         <input type="text" name="phone2"  value="{{Auth::user()->phone2}}" class="form-control @error('phone2') is-invalid @enderror "><br>

                         <label for="bloodgroup">bloodgroup</label><br>
                         <select name="blood_group_id" id="blood_group_id" class="form-control">
                             @foreach($bloodgroups as $bloodgroup)
                               <option value="{{ $bloodgroup->id}}">{{$bloodgroup->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="state">State</label><br>
                         <select name="state_id" id="state_id" class="form-control">
                             @foreach($states as $state)
                               <option value="{{ $state->id}}">{{$state->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">LGA</label><br>
                         <select name="lga_id" id="lga_id" class="form-control">
                             @foreach($lgas as $lga)
                               <option value="{{ $lga->id}}">{{$lga->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Nationality</label><br>
                         <select name="nationality_id" id="nationality_id" class="form-control">                             @foreach($nationalities as $nationality)
                               <option value="{{ $nationality->id}}">{{$nationality->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('photo')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="photo">Photo</label>
                         <input type="file" name="photo"  value="{{Auth::user()->photo}}" class="form-control @error('photo') is-invalid @enderror "><br>
                         <img src="{{ asset(Auth::user()->photo) }}" alt="" width="60" height="70"><br><br>
                                       
                         @error('address')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="address">Address</label>
                         <input type="text" name="address"  value="{{Auth::user()->address}}" class="form-control @error('address') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">update Profile</button>
                     </form><br><br>

                     <div>
                     <div class="card-header"><strong>Change Password</strong></div>
                     <form action="{{ route('profiles.password') }}" id="password" method="POST"><br>
                      @csrf
                      
                      <label for="old password">Old password</label>
                      <input type="password" name="old_password" id="old_password" class="form-control" ><br>
 
                      <label for="old password">New password</label>
                      <input type="password" name="new_password" id="new_password" class="form-control" ><br>
 
                      <label for="confirm password">Confirm password</label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" ><br>
 
                      <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                    </form>
                     </div>
                 </div>

           </div>
       </div>
@endsection