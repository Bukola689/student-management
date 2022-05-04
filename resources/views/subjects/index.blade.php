@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Subject </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-sm">New Subject</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Teacher</th>
            <th scope="col">Class</th>
         </tr>
          </thead>
             <tbody>
                @foreach($subjects as $subject)
              <tr>
                  <td>{{$subject->id}}</td>
                  <td>{{$subject->name}}</td>
                  <td>{{$subject->slug}}</td>
                  <td>{{$subject->teacher->name}}</td>
                  <td>{{$subject->my_class->name}}</td>
                
                  <td><a href="{{route('subjects.edit', $subject->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('subjects.destroy', $subject->id)}}" method="POST">
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
