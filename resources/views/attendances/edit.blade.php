@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Lga</div>
                 <div class="card-body">
                     <form action="{{route('attendances.update', $attendance->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('attendance_date')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="attendance_date">Date</label>
                         <input type="date" name="attendance_date" value="{{$attendance->attendance_date}}" class="form-control @error('attendance_date') is-invalid @enderror"><br>

                         <label for="">Student</label><br>
                         <select name="student_id" id="student_id" class="form-control">
                             @foreach($students as $student)
                                <option value="{{ $student->id}}" {{$student->id == $attendance->student_id ? 'selected' : ''}}>{{$student->name}}</option>
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
                         <input type="text" name="remark" value="{{ $attendance->remark}}" class="form-control @error('remark') is-invalid @enderror"><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Create </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection