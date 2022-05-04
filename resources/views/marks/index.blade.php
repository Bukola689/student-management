@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Mark </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('marks.create') }}" class="btn btn-primary btn-sm ">New Mark</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
           <th class="text-center">S/N</th>
            <th class="text-center">student</th>
            <th class="text-center">subject</th>
            <th class="text-center">class</th>
            <th class="text-center">section</th>
            <th class="text-center">Exam</th>
            <th class="text-center">T1</th>
            <th class="text-center">T2</th>
            <th class="text-center">T3</th>
            <th class="text-center">T4</th>
            <th class="text-center">Exm</th>
            <th class="text-center">Tca</th>
            <th class="text-center">Tex1</th>
            <th class="text-center">Tex2</th>
            <th class="text-center">Tex3</th>
            <th class="text-center">Sub Pos</th>
            <th class="text-center">Cum</th>
            <th class="text-center">Cum Ave</th>
            <th class="text-center">Grade</th>
            <th class="text-center">Year</th>
         </tr>
          </thead>
             <tbody>
                @foreach($marks as $mark)
              <tr>
              <td >{{$mark->id}}</td> 
            <td >{{$mark->student->name}}</td>
            <td >{{$mark->subject->name}}</td>
            <td >{{$mark->my_class->name}}</td>
            <td >{{$mark->section->name}}</td>
            <td >{{$mark->exam->name}}</td>
            <td >{{$mark->t1}}</td> 
            <td >{{$mark->t2}}</td>
            <td >{{$mark->t3}}</td>
            <td >{{$mark->t4}}</td>   
            <td >{{$mark->exm}}</td>
            <td >{{$mark->tca}}</td>
            <td >{{$mark->tex1}} </td>
            <td >{{$mark->tex2}}</td>
            <td >{{$mark->tex3}}</td>
            <td >{{$mark->sub_pos}}</td>
            <td >{{$mark->cum}}</td>
            <td >{{$mark->cum_ave}}</td>
            <td >{{$mark->grade->name}}</td>
            <td >{{$mark->year}}</td>
                  <td><a href="{{route('marks.edit', $mark->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('marks.destroy', $mark->id)}}" method="POST">
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
