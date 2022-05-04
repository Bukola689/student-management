@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update studentRecord</div>
                 <div class="card-body">
                     <form action="{{route('studentrecords.update', $studentrecord->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         <label for="">User</label><br>
                         <select name="user_id" id="user_id" class="form-control">
                             @foreach($users as $user)
                               <option value="{{ $user->id}}" {{ $user->id == $studentrecord->user_id ? 'selected' : '' }} >{{$user->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}"  {{ $myclass->id == $studentrecord->my_class_id ? 'selected' : '' }} >{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Section</label><br>
                         <select name="section_id" id="section_id" class="form-control">
                             @foreach($sections as $section)
                               <option value="{{ $section->id}}"  {{ $section->id == $studentrecord->section_id ? 'selected' : '' }}>{{$section->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('adm no')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="adm_no">Adm No</label>
                         <input type="text" name="adm_no" value="{{ $studentrecord->adm_no}}" class="form-control @error('adm_no') is-invalid @enderror "><br>

                         <label for="">Parent</label><br>
                         <select name="my_parent_id" id="my_parent_id" class="form-control">
                             @foreach($myparents as $myparent)
                               <option value="{{ $myparent->id}}"  {{ $myparent->id == $studentrecord->myparent_id ? 'selected' : '' }}>{{$myparent->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Dorm</label><br>
                         <select name="dorm_id" id="dorm_id" class="form-control">
                             @foreach($dorms as $dorm)
                               <option value="{{ $dorm->id}}"  {{ $dorm->id == $studentrecord->dorm_id ? 'selected' : '' }} >{{$dorm->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('dorm room')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="image">dorm_room-no</label>
                         <input type="text" name="dorm_room_no" class="form-control @error('dorm_room_no') is-invalid @enderror "><br>
                      
                         

                         @error('session')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="session">Section</label>
                         <input type="text" name="session" value="{{ $studentrecord->session}}" class="form-control @error('session') is-invalid @enderror "><br>

                         @error('house')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="house">House</label>
                         <input type="text" name="house" value="{{ $studentrecord->house}}" class="form-control @error('house') is-invalid @enderror "><br>

                         @error('age')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="age">Age</label>
                         <input type="text" name="age" value="{{ $studentrecord->age}}" class="form-control @error('age') is-invalid @enderror "><br>

                         @error('year admitted')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="email">Year admitted</label>
                         <input type="text" name="year_admitted" value="{{ $studentrecord->year_admitted}}" class="form-control @error('year_admitted') is-invalid @enderror "><br>     

                         @error('grad')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="grad">Grad</label>
                         <input type="text" name="grad" value="{{ $studentrecord->grad}}" class="form-control @error('grad') is-invalid @enderror "><br>

                         @error('grade date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="grade date">Grade Date</label>
                         <input type="date" name="grad_date" value="{{ $studentrecord->grad_date}}" class="form-control @error('grade date') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Update Student</button>
                     </form>
                 </div>
           </div>
       </div>
@endsection
