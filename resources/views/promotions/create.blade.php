@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create promotion</div>
                 <div class="card-body">
                     <form action="{{route('promotions.store')}}" method="POST">
                         @csrf

                         <label for="">Student Record</label><br>
                         <select name="student_record_id" id="student_record_id" class="form-control">
                             @foreach($studentrecords as $studentrecord)
                               <option value="{{ $studentrecord->id}}">{{$studentrecord->adm_no}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">From Class</label><br>
                         <select name="from_class_id" id="from_class_id" class="form-control">
                             @foreach($fromclasses as $fromclass)
                               <option value="{{ $fromclass->id}}">{{$fromclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">From section</label><br>
                         <select name="from_section_id" id="from_section_id" class="form-control">
                             @foreach($fromsections as $fromsection)
                               <option value="{{ $fromsection->id}}">{{$fromsection->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">To class</label><br>
                         <select name="to_class_id" id="to_class_id" class="form-control">
                             @foreach($toclasses as $toclass)
                               <option value="{{ $toclass->id}}">{{$toclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">To section</label><br>
                         <select name="to_section_id" id="to_section_id" class="form-control">
                             @foreach($tosections as $tosection)
                               <option value="{{ $tosection->id}}">{{$tosection->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('grade')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="grade">grade</label>
                         <input type="text" name="grade" class="form-control @error('grade') is-invalid @enderror "><br>

                         @error('from_section')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="from_section">From Section</code>
                         <input type="text" name="from_section" class="form-control @error('from_section') is-invalid @enderror "><br>

                         @error('to_section')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="to section">To Session</code>
                         <input type="text" name="to_section" class="form-control @error('to_section') is-invalid @enderror "><br>

                         @error('status')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="status">Status</code>
                         <input type="text" name="status" class="form-control @error('status') is-invalid @enderror "><br>


                         <button type="submit" class="btn btn-primary btn-sm">Create Promotion</button>
                     </form>
                 
           </div>
       </div>
   </div>
@endsection