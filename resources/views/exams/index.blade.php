@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Exam</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('exams.create') }}" class="btn btn-primary btn-sm">New Exam</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Term</th>
            <th scope="col">Year</th>
         </tr>
          </thead>
             <tbody>
                @foreach($exams as $exam)
              <tr>
                  <td>{{$exam->id}}</td>
                  <td>{{$exam->name}}</td>
                  <td>{{$exam->term}}</td>
                  <td>{{$exam->year}}</td>
                  <td><a href="{{route('exams.edit', $exam->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('exams.destroy', $exam->id)}}" method="POST">
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
