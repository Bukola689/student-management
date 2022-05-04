@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Nationality</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('nationalities.create') }}" class="btn btn-primary btn-sm">New Nationality</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
         </tr>
          </thead>
             <tbody>
                @foreach($nationalities as $nationality)
              <tr>
                  <td>{{$nationality->id}}</td>
                  <td>{{$nationality->name}}</td>
                  <td><a href="{{route('nationalities.edit', $nationality->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('nationalities.destroy', $nationality->id)}}" method="POST">
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
