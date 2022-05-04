@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All state</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('states.create') }}" class="btn btn-primary btn-sm">New state</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Lga</th>
            <th scope="col">Name</th>
         </tr>
          </thead>
             <tbody>
                @foreach($states as $state)
              <tr>
                  <td>{{$state->id}}</td>
                  <td>{{$state->lga->name}}</td>
                  <td>{{$state->name}}</td>
                  <td><a href="{{route('states.edit', $state->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('states.destroy', $state->id)}}" method="POST">
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