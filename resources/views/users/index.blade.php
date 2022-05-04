@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">Admin User</div>
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
                <div>
                  <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">New User</a>
                </div>
               
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">picture</th> 
            <th scope="col">Name</th>
            @can('super_Admin', App\Models\User::class)
            <th scope="col">Usetype</th>
            @endcan
            <th scope="col">Email</th>
           <th scope="col">ACTION</th>
         </tr>
          </thead>
             <tbody>
                @foreach($users as $user) 
              <tr>
                  <td>{{$user->id}}</td>
                  <td>
                  <img src="{{ asset($user->photo) }}" alt="{{$user->name}}" width="60" height="70">
                  </td>
                  <td>{{$user->name}}</td>
                  @can('super_Admin', App\Models\User::class) 
                  <td>
                   <!-- Button trigger modal -->
                    
                 
                <form action="{{ route('super.admin', $user->id) }}" method="POST">
                    @csrf
        
                     <div class="modal-body">
              
                       <select name="user_type" id="user_type_id">
                         <option value="">select usertype</option>
                         <option value="super_admin" {{$user->user_type == 'super_admin' ? 'selected': '' }}>Super Admin</option>
                         <option value="admin" {{$user->user_type == 'admin' ? 'selected': '' }}>Admin</option>
                         <option value="teacher" {{$user->user_type == 'teacher' ? 'selected': '' }}>Teacher</option>
                         <option value="libarian" {{$user->user_type == 'libarian' ? 'selected': '' }}>Libarian</option>
                         <option value="parent" {{$user->user_type == 'parent' ? 'selected': '' }}>Parent</option>
                         <option value="accountant" {{$user->user_type == 'accountant' ? 'selected': '' }}>Accountant</option>
                         <option value="student" {{$user->user_type == 'student' ? 'selected': '' }}>Student</option>
                       </select>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
                  </form>
      
                 </td>
                 @endcan
                  <td>{{$user->email}}</td>
             
                  <td> <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
    </div>
@endsection
