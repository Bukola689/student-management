@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Book Request </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('bookrequests.create') }}" class="btn btn-primary btn-sm">New BookRequest</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">User</th>
            <th scope="col">Book</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Returned</th>
            <th scope="col">Status</th>
         </tr>
          </thead>
             <tbody>
                @foreach($bookrequests as $bookrequest)
              <tr>
                  <td>{{$bookrequest->id}}</td>
                  <td>{{$bookrequest->user->name}}</td>
                  <td>{{$bookrequest->book->name}}</td>
                  <td>{{$bookrequest->start_date}}</td>
                  <td>{{$bookrequest->end_date}}</td>
                  <td>{{$bookrequest->returned}}</td>
                  <td>{{$bookrequest->status}}</td>
                  <td><a href="{{route('bookrequests.edit', $bookrequest->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('bookrequests.destroy', $bookrequest->id)}}" method="POST">
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
