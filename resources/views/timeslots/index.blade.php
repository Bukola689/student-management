@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Time Slot</div>
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
                  <a href="{{ route('timeslots.create') }}" class="btn btn-primary btn-sm">New Time Slot</a>
                </div>
               
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">TTR</th> 
            <th scope="col">timestamp from</th>
            <th scope="col">timestamp to</th>
            <th scope="col">full</th>
            <th scope="col">time from</th>
            <th scope="col">time to</th>
            <th scope="col">hour from</th>
            <th scope="col">min from</th>
            <th scope="col">meridian from</th>
            <th scope="col">hour to</th>
            <th scope="col">min to</th>
            <th scope="col">meridian to</th>
           <th scope="col">ACTION</th>
         </tr>
          </thead>
             <tbody>
                @foreach($timeslots as $timeslot)
              <tr>
                  <td>{{$timeslot->id}}</td>
                  <td>{{$timeslot->time_table_record->name}}</td>
                  <td>{{$timeslot->timestamp_from}}</td>
                  <td>{{$timeslot->timestamp_to}}</td>
                  <td>{{$timeslot->full}}</td>
                  <td>{{$timeslot->time_from}}</td>
                  <td>{{$timeslot->time_to}}</td>
                  <td>{{$timeslot->hour_from}}</td>
                  <td>{{$timeslot->min_from}}</td>
                  <td>{{$timeslot->meridian_from}}</td>
                  <td>{{$timeslot->hour_to}}</td>
                  <td>{{$timeslot->min_to}}</td>
                  <td>{{$timeslot->meridian_to}}</td>

                  <td> <a href="{{ route('timeslots.edit', $timeslot->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('timeslots.destroy', $timeslot->id) }}" method="POST">
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
