<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Role
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Usertype</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
             <div class="modal-body">
                 @csrf
                
                 <select name="user_type" id="{{$user->user_type}}">
                        <option value="">select usertype</option>
                        <option value="admin" {{$user->user_type == 'admin' ? 'selected': '' }}>Admin</option>
                        <option value="teacher" {{$user->user_type == 'teacher' ? 'selected': '' }}>Teacher</option>
                        <option value="parent" {{$user->user_type == 'parent' ? 'selected': '' }}>Parent</option>
                        <option value="student" {{$user->user_type == 'student' ? 'selected': '' }}>Student</option>
                 </select>
                 </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                 </div>
                  </form> 
                </div>
             </div>
           </div>
                  </td>
                  <td>{{$user->email}}</</td>
                  <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('users.destroy', $user->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>