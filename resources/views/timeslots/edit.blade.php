@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">update Timeslot</div>
                 <div class="card-body">
                     <form action="{{route('timeslots.update', $timeslot->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         <label for="">TTR</label><br>
                         <select name="time_table_record_id" id="time_table_record_id" class="form-control">
                             @foreach($timetablerecords as $timetablerecord)
                               <option value="{{ $timetablerecord->id}}" {{ $timetablerecord->id == $timeslot->timetablerecord_id ? 'selected' : ''}}>{{$timetablerecord->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('timestamp_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="timestamp_from">Timestamp_from</label>
                         <input type="text" name="timestamp_from" value="{{ $timeslot->timestamp_from}}" class="form-control @error('timestamp_from') is-invalid @enderror "><br>

                         @error('timestamp_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="timestamp_to">Timestamp to</label>
                         <input type="text" name="timestamp_to" value="{{ $timeslot->timestamp_to}}" class="form-control @error('timestamp_to') is-invalid @enderror "><br>

                         @error('full')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="full">Full</label>
                         <input type="text" name="full" value="{{ $timeslot->full}}" class="form-control @error('full') is-invalid @enderror "><br>

                         @error('time_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="time_from">Time from</label>
                         <input type="text" name="time_from" value="{{ $timeslot->time_from}}" class="form-control @error('time_from') is-invalid @enderror "><br>

                         @error('time_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="time_to">Time to</label>
                         <input type="text" name="time_to" value="{{ $timeslot->time_to}}" class="form-control @error('time_to') is-invalid @enderror "><br>

                         @error('hour_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="hour_from">Hour from</label>
                         <input type="text" name="hour_from" value="{{ $timeslot->hour_from}}" class="form-control @error('hour_from') is-invalid @enderror "><br>

                         @error('hour_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="hour_to">Hour to</label>
                         <input type="text" name="hour_to" value="{{ $timeslot->hour_to}}" class="form-control @error('hour_to') is-invalid @enderror "><br>

                         @error('min_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="min_from">Min from</label>
                         <input type="text" name="min_from" value="{{ $timeslot->min_from}}" class="form-control @error('min_from') is-invalid @enderror "><br>

                         @error('min_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="min_to">Hour from</label>
                         <input type="text" name="min_to" value="{{ $timeslot->min_to}}" class="form-control @error('min_to') is-invalid @enderror "><br>

                         @error('meridian_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="meridian_from">Meridian from</label>
                         <input type="text" name="meridian_from" value="{{ $timeslot->meridian_from}}" class="form-control @error('meridian_from') is-invalid @enderror "><br>

                         @error('meridian_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="meridian_to">Hour from</label>
                         <input type="text" name="meridian_to" value="{{ $timeslot->meridian_to}}" class="form-control @error('meridian_to') is-invalid @enderror "><br>
                         
                        
                         <button type="submit" class="btn btn-primary btn-sm">Update Timeslot </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection