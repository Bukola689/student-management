@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Dorms </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('dorms.create') }}" class="btn btn-primary btn-sm">New Dorm</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
         </tr>
          </thead>
             <tbody>
                @foreach($dorms as $dorm)
              <tr>
                  <td>{{$dorm->id}}</td>
                  <td>{{$dorm->name}}</td>
                  <td>{{$dorm->description}}</td>
                  <td><a href="{{route('dorms.edit', $dorm->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('dorms.destroy', $dorm->id)}}" method="POST">
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
