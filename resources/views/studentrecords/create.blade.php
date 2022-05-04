@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create studentRecord</div>
                 <div class="card-body">
                     <form action="{{route('studentrecords.store')}}" method="POST">
                         @csrf

                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}">{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('section')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="">Section</label><br>
                         <select name="section_id" id="section_id" class="form-control">
                             @foreach($sections as $section)
                               <option value="{{ $section->id}}">{{$section->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('adm no')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="adm_no">Adm No</label>
                         <input type="text" name="adm_no" class="form-control @error('adm_no') is-invalid @enderror "><br>

                         @error('parent')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="">Parent</label><br>
                         <select name="my_parent_id" id="my_parent_id" class="form-control">
                           @foreach($myparents as $myparent)
                               <option value="{{$myparent->id}}">{{$myparent->name}}</option>
                               @endforeach
                         </select>
                         <br>

                         <label for="">Dorm</label><br>
                         <select name="dorm_id" id="dorm_id" class="form-control">
                             @foreach($dorms as $dorm)
                               <option value="{{ $dorm->id}}">{{$dorm->name}}</option>
                             @endforeach
                         </select>
                         <br>
                         @error('dorm room')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="dorm">dorm_room-no</label>
                         <input type="text" name="dorm_room_no" class="form-control @error('dorm_room_no') is-invalid @enderror "><br>
                      

                         @error('session')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="session">Session</label>
                         <input type="text" name="session" class="form-control @error('session') is-invalid @enderror "><br>

                         @error('house')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="house">House</label>
                         <input type="text" name="house" class="form-control @error('house') is-invalid @enderror "><br>

                         @error('age')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="age">Age</label>
                         <input type="text" name="age" class="form-control @error('age') is-invalid @enderror "><br>

                         @error('year admitted')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="">Year admitted</label>
                         <input type="date" name="year_admitted" class="form-control @error('year_admitted') is-invalid @enderror "><br>     

                         @error('grad')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="grad">Grad</label>
                         <input type="text" name="grad" class="form-control @error('grad') is-invalid @enderror "><br>

                         @error('grade date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="grade date">Grade Date</label>
                         <input type="date" name="grad_date" class="form-control @error('grade date') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Create Student</button>
                     </form>
                 </div>
           </div>
       </div>
@endsection
