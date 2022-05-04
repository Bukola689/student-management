@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Attendance</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('attendances.create') }}" class="btn btn-primary btn-sm">Attendance</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Date</th>
            <th scope="col">Student Name</th>
            <th scope="col">Remark</th>
            <th scope="col">Status</th>
         </tr>
          </thead>
             <tbody>
                @foreach($attendances as $attendance)
              <tr>
                  <td>{{$attendance->id}}</td>
                  <td>{{$attendance->attendance_date}}</td>
                  <td>{{$attendance->student->name}}</td>
                  <td>{{$attendance->status}}</td>
                  <td>{{$attendance->remark}}</td>
                 
                  <td><a href="{{route('attendances.edit', $attendance->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('attendances.destroy', $attendance->id)}}" method="POST">
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
@endsection
