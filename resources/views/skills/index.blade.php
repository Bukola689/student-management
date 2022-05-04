@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Skill</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('skills.create') }}" class="btn btn-primary btn-sm">New Skill</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Skill type</th>
            <th scope="col">Class type</th>
         </tr>
          </thead>
             <tbody>
                @foreach($skills as $skill)
              <tr>
                  <td>{{$skill->id}}</td>
                  <td>{{$skill->name}}</td>
                  <td>{{$skill->skill_type}}</td>
                  <td>{{$skill->class_type}}</td>
                  <td><a href="{{route('skills.edit', $skill->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('skills.destroy', $skill->id)}}" method="POST">
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
