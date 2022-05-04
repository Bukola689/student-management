@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Timetable</div>
                 <div class="card-body">
                     <form action="{{route('timetables.store')}}" method="POST">
                         @csrf

                         <label for="">TimeTableRecord</label><br>
                         <select name="time_table_record_id" id="" class="form-control">
                             @foreach($timetablerecords as $timetablerecord)
                               <option value="{{ $timetablerecord->id}}">{{$timetablerecord->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Timeslots</label><br>
                         <select name="time_slot_id" id="" class="form-control">
                             @foreach($timeslots as $timeslot)
                               <option value="{{ $timeslot->id}}">{{$timeslot->full}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('exam_date')
                         <div class="alert alert-dange">{{ $message }}</div>
                         @enderror
                         <label for="exam_date">Exam Date</label>
                         <input type="date" name="exam_date" class="form-control @error('exam_date') is-invalid @enderror "><br>

                         @error('day')
                         <div class="alert alert-dange">{{ $message }}</div>
                         @enderror
                         <label for="day">Day</label>
                         <input type="text" name="day" class="form-control @error('day') is-invalid @enderror "><br>
                       
                         @error('timestamp_from')
                         <div class="alert alert-dange">{{ $message }}</div>
                         @enderror
                         <label for="timestamp_from">Timestamp From</label>
                         <input type="text" name="timestamp_from" class="form-control @error('timestamp_from') is-invalid @enderror "><br>

                         @error('timestamp_to')
                         <div class="alert alert-dange">{{ $message }}</div>
                         @enderror
                         <label for="timestamp_to">Timestamp TO</label>
                         <input type="text" name="timestamp_to" class="form-control @error('timestamp_to') is-invalid @enderror "><br>

                         <label for="">Subject</label><br>
                         <select name="subject_id" id="" class="form-control">
                             @foreach($subjects as $subject)
                               <option value="{{ $subject->id}}">{{$subject->name}}</option>
                             @endforeach
                         </select>
                         <br>
                         
                         <button type="submit" class="btn btn-primary btn-sm">Add Timestable </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection