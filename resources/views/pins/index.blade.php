@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> PIN </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('pins.create') }}" class="btn btn-primary btn-sm">New Pin</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Code</th>
            <th scope="col">Used</th>
            <th scope="col">Times_used</th>
            <th scope="col">User</th>
            <th scope="col">Student</th>
         </tr>
          </thead>
             <tbody>
                @foreach($pins as $pin)
              <tr>
                  <td>{{$pin->id}}</td>
                  <td>{{$pin->code}}</td>
                  <td>{{$pin->used}}</td>
                  <td>{{$pin->times_used}}</td>
                  <td>{{ $pin->user->name }}</td>
                  <td> {{ $pin->student->name }}</td>
                  <td><a href="{{route('pins.edit', $pin->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('pins.destroy', $pin->id)}}" method="POST">
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
