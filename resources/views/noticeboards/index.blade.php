@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header">All Notice Board</div>
              <div class="card-body">
                <div>
                  <a href="{{ route('noticeboards.create') }}" class="btn btn-primary btn-sm">New Notice Board</a>
                </div><br>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
         </tr>
          </thead>
             <tbody>
                @foreach($noticeboards as $noticeboard)
              <tr>
                  <td>{{$noticeboard->id}}</td>
                  <td>{{$noticeboard->title}}</td>
                  <td>{{$noticeboard->description}}</td>
                  <td>{{$noticeboard->board_date}}</td>
                  <td><a href="{{route('noticeboards.edit', $noticeboard->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('noticeboards.destroy', $noticeboard->id)}}" method="POST">
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