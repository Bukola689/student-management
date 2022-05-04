@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> StudentRecord </div>
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
                  <a href="{{ route('studentrecords.create') }}" class="btn btn-primary btn-sm">New studentRecord</a>
                </div><br>
               
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Section</th>
            <th scope="col">Adm no</th>
            <th scope="col">Parent</th>
            <th scope="col">Dorm</th>
            <th scope="col">Dorm room</th>
            <th scope="col">Session</th>
            <th scope="col">House</th>
            <th scope="col">Age</th>
            <th scope="col">Year admitted</th>
            <th scope="col">Graduate</th>
            <th scope="col">Grade Date</th>

           <th scope="col">ACTION</th>
         </tr>
          </thead>
             <tbody>
                @foreach($studentrecords as $studentrecord)
              <tr>
                  <td>{{$studentrecord->id}}</td>
                  <td>{{$studentrecord->user->name}}</td>
                  <td>{{$studentrecord->my_class->name}}</td>
                  <td>{{$studentrecord->section->name}}</td>
                  <td>{{$studentrecord->adm_no}}</td>
                  <td>{{$studentrecord->my_parent->name}}</td>
                  <td>{{$studentrecord->dorm->name}}</td>
                  <td>{{$studentrecord->dorm_room_no}}</td>
                  <td>{{$studentrecord->session}}</td>
                  <td>{{$studentrecord->house}}</td>
                  <td>{{$studentrecord->age}}</td>
                  <td>{{$studentrecord->year_admitted}}</td>
                  <td>{{$studentrecord->grad}}</td>
                  <td>{{$studentrecord->grad_date}}</td>
                  
                  <td> <a href="{{ route('studentrecords.edit', $studentrecord->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('studentrecords.destroy', $studentrecord->id) }}" method="POST">
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
