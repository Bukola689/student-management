@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create ExamRecord</div>
                 <div class="card-body">
                     <form action="{{route('examrecords.update', $examrecord->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                       
                         <label for="">Student</label><br>
                         <select name="student_id" id="student_id" class="form-control">
                             @foreach($students as $student)
                               <option value="{{ $student->id}}"  {{ $student->id == $examrecord->student_id ? 'selected' : ''}}>{{$student->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Exam</label><br>
                         <select name="exam_id" id="exam_id" class="form-control">
                             @foreach($exams as $exam)
                               <option value="{{ $exam->id}}" {{ $exam->id == $examrecord->exam_id ? 'selected' : ''}}>{{$exam->name}}</option>
                             @endforeach
                         </select>
                         <br>


                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}"  {{ $myclass->id == $examrecord->myclass_id ? 'selected' : ''}}>{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Section</label><br>
                         <select name="section_id" id="section_id" class="form-control">
                             @foreach($sections as $section)
                               <option value="{{ $section->id}}"  {{ $section->id == $examrecord->section_id ? 'selected' : ''}}>{{$section->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('Total')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="total">Total </label>
                         <input type="text" name="total" value="{{$examrecord->total}}" class="form-control @error('total') is-valid @enderror "><br>

                         @error('average')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="average">Average</label>
                         <input type="text" name="average" value="{{$examrecord->average}}" class="form-control @error('average') is-invalid @enderror "><br>                      

                         @error('section')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="class_average">Section</label>
                         <input type="text" name="class_average" value="{{$examrecord->class_average}}" class="form-control @error('class_average') is-invalid @enderror "><br>

                         @error('position')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="position">Position</label>
                         <input type="text" name="position" value="{{$examrecord->position}}" class="form-control @error('position') is-invalid @enderror "><br>

                         @error('af')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="af">Af</label>
                         <input type="text" name="af" value="{{$examrecord->af}}" class="form-control @error('af') is-invalid @enderror "><br>

                         @error('Ps')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="af">Ps</label>
                         <input type="text" name="ps" value="{{$examrecord->ps}}" class="form-control @error('ps') is-invalid @enderror "><br>     

                         @error('p_comment')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="p_comment">P Comment</label>
                         <input type="text" name="p_comment" value="{{$examrecord->p_comment}}" Class="form-control @error('p_comment')invalid @enderror "><br>

                         @error('T comment')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="t_comment ">T Comment</label>
                         <input type="text" name="t_comment" value="{{$examrecord->t_comment}}" class="form-control @error('t_comment') is-invalid @enderror "><br>

                         @error('year')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="year ">Year</label>
                         <input type="text" name="year" value="{{$examrecord->year}}" class="form-control @error('year') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Create Student</button>
                     </form>
                 </div>
           </div>
       </div>
@endsection
