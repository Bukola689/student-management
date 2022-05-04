@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Staff Record </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('staffrecords.create') }}" class="btn btn-primary btn-sm">New Staff Record</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">User</th>
            <th scope="col">Code</th>
            <th scope="col">Emp date</th>
         </tr>
          </thead>
             <tbody>
                @foreach($staffRecords as $staffrecord)
              <tr>
                  <td>{{$staffrecord->id}}</td>
                  <td>{{$staffrecord->user->name}}</td>
                  <td>{{$staffrecord->code}}</td>
                  <td>{{$staffrecord->emp_date}}</td>
                
                  <td><a href="{{route('staffrecords.edit', $staffrecord->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('staffrecords.destroy', $staffrecord->id)}}" method="POST">
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