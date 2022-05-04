@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> Promotion </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('promotions.create') }}" class="btn btn-primary btn-sm">New Promotion</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">student rec</th>
            <th scope="col">from class</th>
            <th scope="col">from section</th>
            <th scope="col">to class</th>
            <th scope="col">to section</th>
            <th scope="col">grade</th>
            <th scope="col">from session</th>
            <th scope="col">to session</th>
            <th scope="col">status</th>
         </tr>
          </thead>
             <tbody>
                @foreach($promotions as $promotion)
              <tr>
                  <td>{{$promotion->id}}</td>
                  <td>{{$promotion->student_record->name}}</td>
                  <td>{{$promotion->from_class->name}}</td>
                  <td>{{$promotion->from_section->name}}</td>
                  <td>{{$promotion->to_class->name}}</td>
                  <td>{{$promotion->to_section->name }}</td>
                  <td>{{$promotion->grade }}</td>
                  <td>{{$promotion->from_session}}</td>
                  <td>{{$promotion->to_session}}</td>
                  <td>{{$promotion->status}}</td>
                  <td><a href="{{route('promotions.edit', $promotion->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('promotions.destroy', $promotion->id)}}" method="POST">
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
