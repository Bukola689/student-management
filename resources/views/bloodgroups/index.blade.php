@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All BloodGroup</div>
              <div class="card-body">
                <div>
                  <a href="bloodgroups.create" class="btn btn-primary btn-sm">New Bloodgroup</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
         </tr>
          </thead>
             <tbody>
                @foreach($bloodgroups as $bloodgroup)
              <tr>
                  <td>{{$bloodgroup->id}}</td>
                  <td>{{$bloodgroup->name}}</td>
                  <td><a href="{{route('bloodgroups.edit', $bloodgroup->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('bloodgroups.destroy', $bloodgroup->id)}}" method="POST">
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
