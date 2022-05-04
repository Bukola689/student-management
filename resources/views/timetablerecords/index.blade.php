@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> TimeTabkeRecord </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('timetablerecords.create') }}" class="btn btn-primary btn-sm">New T T Record</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Exam</th>
            <th scope="col">Year</th>
         </tr>
          </thead>
             <tbody>
                @foreach($timetablerecords as $timetablerecord)
              <tr>
                  <td>{{$timetablerecord->id}}</td>
                  <td>{{$timetablerecord->name}}</td>
                  <td>{{$timetablerecord->my_class->name}}</td>
                  <td>{{$timetablerecord->exam->name}}</td>
                  <td>{{$timetablerecord->year}}</td>
                  <td><a href="{{route('timetablerecords.edit', $timetablerecord->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('timetablerecords.destroy', $timetablerecord->id)}}" method="POST">
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
