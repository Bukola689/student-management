@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update Grade</div>
                 <div class="card-body">
                     <form action="{{route('grades.update', $grade->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="name">Name</label>
                         <input type="text" name="name" value="{{$grade->name}}" class="form-control @error('name') is-invalid @enderror "><br>

                         <label for="">Classtype</label><br>
                         <select name="class_type_id" id="class_type_id" class="form-control">
                             @foreach($classtypes as $classtype)
                               <option value="{{ $classtype->id}}">{{$classtype->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('mark_from')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="mark_from">Mark from</label>
                         <input type="text" name="mark_from"  value="{{$grade->mark_from}}" class="form-control @error('mark_from') is-invalid @enderror "><br>

                         @error('mark_to')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="mark_to">Mark to</label>
                         <input type="text" name="mark_to"  value="{{$grade->mark_to}}" class="form-control @error('mark_to') is-invalid @enderror "><br>

                         @error('remark')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="remark">Remark</label>
                         <input type="text" name="remark"  value="{{$grade->remark}}" class="form-control @error('remark') is-invalid @enderror "><br>
                        
                         <button type="submit" class="btn btn-primary btn-sm">Update Grade </button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection