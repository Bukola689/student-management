@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create grade</div>
                 <div class="card-body">
                     <form action="{{route('grades.store')}}" method="POST">
                         @csrf

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "><br>

                         <label for="">classtype</label><br>
                         <select name="class_type_id" id="class_type_id" class="form-control">
                         @foreach($classtypes as $classtype)
                               <option value="{{ $classtype->id }}">{{$classtype->name}}</option>
                             @endforeach
                         </select><br>

                         @error('mark from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="">Mark from</label>
                         <input type="text" name="mark_from" class="form-control @error('mark from') is-invalid @enderror "><br>

                        @error('mark to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="">Mark to</label>
                         <input type="text" name="mark_to" class="form-control @error('mark from') is-invalid @enderror "><br>

                        @error('remark')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="">Remark</label>
                         <input type="text" name="remark" class="form-control @error('remark') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm"> create </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection