@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Local Government Area </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('lgas.create') }}" class="btn btn-primary btn-sm">New LGA</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Name</th>
         </tr>
          </thead>
             <tbody>
                @foreach($lgas as $lga)
              <tr>
                  <td>{{$lga->id}}</td>
                  <td>{{$lga->name}}</td>
                  <td>{{$lga->state->count()}}</td>
                  <td><a href="{{route('lgas.edit', $lga->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('lgas.destroy', $lga->id)}}" method="POST">
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
