@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Section </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('sections.create') }}" class="btn btn-primary btn-sm">New Section</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Class</th>
            <th scope="col">Teacher</th>
            <th scope="col">Name</th>
            <th scope="col">Active</th>
           </tr>
          </thead>
             <tbody>
                @foreach($sections as $section)
              <tr>
                  <td>{{$section->id}}</td>
                  <td>{{$section->my_class->name}}</td>
                  <td>{{$section->teacher->name}}</td>
                  <td>{{$section->name}}</td>     
                  <td>{{$section->active}}</td>
                  <td><a href="{{route('sections.edit', $section->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('sections.destroy', $section->id)}}" method="POST">
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
