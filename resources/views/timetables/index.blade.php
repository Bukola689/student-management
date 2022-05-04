@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Time Table</div>
              <div class="card-body">
              <form method="GET" action="">
		            	<div class="row">
			            	<div class="col-md-6">
			             		<input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
			            	</div>
			          	<div class="col-md-6">
			      	     	<button type="submit" class="btn btn-success">Search</button>
			          	</div>
		            	</div>
		           </form>
              <br>
                <div class="col-md-8">
                <div>
                  <a href="{{ route('timetables.create') }}" class="btn btn-primary btn-sm">New Time table</a>
                </div>
               
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">time table record</th> 
            <th scope="col">table slot</th>
            <th scope="col">exam date</th>
            <th scope="col">day</th>
            <th scope="col">timestamp from</th>
            <th scope="col">timestamp to</th>
            <th scope="col">subject</th>
           <th scope="col">ACTION</th>
         </tr>
          </thead>
             <tbody>
                @foreach($timetables as $timetable)
              <tr>
                  <td>{{$timetable->id}}</td>
                  <td>{{$timetable->time_table_record->name}}</td>
                  <td>{{$timetable->time_slot->full}}</td>
                  <td>{{$timetable->exam_date}}</td>
                  <td>{{$timetable->day}}</td>
                  <td>{{$timetable->timestamp_from}}</td>
                  <td>{{$timetable->timestamp_to}}</td>
                  <td>{{$timetable->subject->name}}</td>
                 
                  <td> <a href="{{ route('timetables.edit', $timetable->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('timetables.destroy', $timetable->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </td>
              </tr>
               @endforeach
               </tbody>
           </table>
         </div>   
       </div>
    </div>
@endsection
