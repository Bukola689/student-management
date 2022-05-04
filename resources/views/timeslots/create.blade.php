@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Timeslot</div>
                 <div class="card-body">
                     <form action="{{route('timeslots.store')}}" method="POST">
                         @csrf

                         <label for="">TTR</label><br>
                         <select name="time_table_record_id" id="time_table_record_id" class="form-control">
                             @foreach($timetablerecords as $timetablerecord)
                               <option value="{{ $timetablerecord->id}}">{{$timetablerecord->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('timestamp_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="timestamp_from">Timestamp_from</label>
                         <input type="text" name="timestamp_from" class="form-control @error('timestamp_from') is-invalid @enderror "><br>

                         @error('timestamp_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="timestamp_to">Timestamp to</label>
                         <input type="text" name="timestamp_to" class="form-control @error('timestamp_to') is-invalid @enderror "><br>

                         @error('full')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="full">Full</label>
                         <input type="text" name="full" class="form-control @error('full') is-invalid @enderror "><br>

                         @error('time_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="time_from">Time from</label>
                         <input type="text" name="time_from" class="form-control @error('time_from') is-invalid @enderror "><br>

                         @error('time_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="time_to">Time to</label>
                         <input type="text" name="time_to" class="form-control @error('time_to') is-invalid @enderror "><br>

                         @error('hour_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="hour_from">Hour from</label>
                         <input type="text" name="hour_from" class="form-control @error('hour_from') is-invalid @enderror "><br>
                         <br>

                         @error('hour_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="hour_to">Hour to</label>
                         <input type="text" name="hour_to" class="form-control @error('hour_to') is-invalid @enderror "><br>
                         <br>

                         @error('min_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="min_from">Min from</label>
                         <input type="text" name="min_from" class="form-control @error('min_from') is-invalid @enderror "><br>
                         <br>

                         @error('min_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="min_to">Hour from</label>
                         <input type="text" name="min_to" class="form-control @error('min_to') is-invalid @enderror "><br>
                         <br>

                         @error('meridian_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="meridian_from">Meridian from</label>
                         <input type="text" name="meridian_from" class="form-control @error('meridian_from') is-invalid @enderror "><br>
                         <br>

                         @error('meridian_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="meridian_to">Meridian to</label>
                         <input type="text" name="meridian_to" class="form-control @error('meridian_to') is-invalid @enderror "><br>
                         <br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Add Timeslot </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection