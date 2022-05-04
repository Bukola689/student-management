@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Attendance</div>
                 <div class="card-body">
                     <form action="{{route('attendances.store')}}" method="POST">
                         @csrf

                         @error('attendance_date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="attendance_date">Date</label>
                         <input type="date" name="attendance_date" class="form-control @error('attendance_date') is-invalid @enderror">

                         <label for="">Student</label><br>
                         <select name="student_id" id="student_id" class="form-control">
                             @foreach($students as $student)
                               <option value="{{ $student->id}}">{{$student->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('status')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="status">Status</label>
                         <select name="status" id="status" class="form-control">
                               <option value="present">Present</option>
                               <option value="Absent">Absent</option>
                               <option value="other">Other</option>
                         </select><br>

                         @error('remark')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="remark">Remark</label>
                         <input type="text" name="remark" class="form-control @error('remark') is-invalid @enderror"><br>
                                                
                         <button type="submit" class="btn btn-primary btn-sm">Create Attendance</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection