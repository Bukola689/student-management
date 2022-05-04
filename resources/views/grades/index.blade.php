@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Grade </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('grades.create') }}" class="btn btn-primary btn-sm">New Grade</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">clas type</th>
            <th scope="col">mark from</th>
            <th scope="col">mark to</th> 
            <th scope="col">Remark</th> 
         </tr>
          </thead>
             <tbody>
                @foreach($grades as $grade)
              <tr>
                  <td>{{$grade->id}}</td>
                  <td>{{$grade->name}}</td>
                  <td>{{$grade->class_type->name}}</td>
                  <td>{{$grade->mark_from}}</td>
                  <td>{{$grade->mark_to}}</td>
                  <td>{{$grade->remark}}</td>
                  <td><a href="{{route('grades.edit', $grade->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('grades.destroy', $grade->id)}}" method="POST">
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
