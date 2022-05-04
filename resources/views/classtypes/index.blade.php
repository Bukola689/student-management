@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Class type</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('classtypes.create') }}" class="btn btn-primary btn-sm">New classtype</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Count classtype</th>
         </tr>
          </thead>
             <tbody>
                @foreach($classtypes as $classtype)
              <tr>
                  <td>{{$classtype->id}}</td>
                  <td>{{$classtype->name}}</td>
                  <td>{{$classtype->code}}</td>
                  <td>{{$classtype->myclass->count()}}</td>
                  <td><a href="{{route('classtypes.edit', $classtype->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('classtypes.destroy', $classtype->id)}}" method="POST">
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