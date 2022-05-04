@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">Search All User</div>
              <div class="card-body">
              <form method="POST" action="{{route('users.search')}}">
                @csrf
		            	<div class="row">
			            	<div class="col-md-6">
			             		<input type="text" name="query" class="form-control" placeholder="Search" value="{{ old('search') }}">
			            	</div>
			            	<div class="col-md-6">
			      	     	<button type="submit" class="btn btn-success">Search</button>
			            	</div>
		            	</div>
		           </form>
              <br>
                <div class="col-md-8">
               
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
         </tr>
          </thead>
             <tbody>
             @foreach($users as $user)
              <tr>
                  <td>{{$user->id}}</td>
                  <td>
                    <img src="{{ asset('photo/'. $user->photo) }}" alt="" width="60" height="70">
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
            @endforeach
              </tr>
               </tbody>
           </table>
         </div>   
       </div>
    </div>
@endsection
