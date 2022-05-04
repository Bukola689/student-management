@extends('layouts.app')

@section('content')
      <div class="col-md-8">
        <div class="card">
           <div class="card-header"> settings </div>
              <div class="card-body">
                <div>
                  <a href="{{ route('settings.create') }}" class="btn btn-primary btn-sm">New settings</a>
                </div>
                <table class="table table-bordered">
              <thead>
           <tr>
            <th scope="col">S/N</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
         </tr>
          </thead>
             <tbody>
                @foreach($settings as $setting)
              <tr>
                  <td>{{$setting->id}}</td>
                  <td>{{$setting->type}}</td>
                  <td>{{$setting->description}}</td>
                  <td><a href="{{route('settings.edit', $setting->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td>
                    <form action="{{ route('settings.destroy', $setting->id)}}" method="POST">
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
