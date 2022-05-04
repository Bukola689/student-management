@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Class </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('classes.create') }}" class="btn btn-primary btn-sm">New Class</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">class type</th>
            <th scope="col">Name</th>
         </tr>
          </thead>
             <tbody>
           
                @foreach($myclasses as $myclass)
            
              <tr>
                  <td>{{$myclass->id}}</td>
                  <td>
              
                 {{$myclass->class_type->name }}
                
                </td>
                  <td>{{$myclass->name}}</td>
                  <td><a href="{{route('classes.edit', $myclass->id)}}" myclass="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('classes.destroy', $myclass->id)}}" method="POST">
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
