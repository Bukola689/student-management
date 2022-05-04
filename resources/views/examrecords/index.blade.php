@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> ExamRecord </div>
              <div class="card-body">
              <form method="GET" action="">
		            	<div class="row">
			            	<div class="col-md-6">
			             		<input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
			            	</div><br>
			          	<div class="col-md-6">
			      	     	<button type="submit" class="btn btn-success">Search</button>
			          	</div>
		            	</div>
		           </form>
              <br>
                <div class="col-md-8">
                <div>
                  <a href="{{ route('examrecords.create') }}" class="btn btn-primary btn-sm">New Exam record</a>
                </div>
               
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">stud</th> 
            <th scope="col">sub</th>
            <th scope="col">Class</th>
            <th scope="col">Sec</th>
            <th scope="col">Total</th>
            <th scope="col">Ave</th>
            <th scope="col">Class ave </th>
            <th scope="col">position</th>
            <th scope="col">Af</th>
            <th scope="col">Ps</th>
            <th scope="col">Af com</th>
            <th scope="col">Ps com</th>
            <th scope="col">Year</th>
           <th scope="col">ACTION</th>
         </tr>
          </thead>
             <tbody>
                @foreach($examRecords as $examrecord)
              <tr>
                  <td>{{$examrecord->id}}</td>
                  <td>{{$examrecord->student->name}}</td>
                  <td>{{$examrecord->exam->name}}</td>
                  <td>{{$examrecord->my_class->name}}</td>
                  <td>{{$examrecord->section->name}}</td>
                  <td>{{$examrecord->total}}</td>
                  <td>{{$examrecord->average}}</td>
                  <td>{{$examrecord->class_average}}</td>
                  <td>{{$examrecord->position}}</td>
                  <td>{{$examrecord->af}}</td>
                  <td>{{$examrecord->ps}}</td>
                  <td>{{$examrecord->p_comment}}</td>
                  <td>{{$examrecord->t_comment}}</td>
                  <td>{{$examrecord->year}}</td>
                 
                  <td> <a href="{{ route('examrecords.edit', $examrecord->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('examrecords.destroy', $examrecord->id) }}" method="POST">
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
