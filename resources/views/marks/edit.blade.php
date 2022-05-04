@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Update Mark</div>
                 <div class="card-body">
                     <form action="{{route('marks.update', $mark->id)}}" method="POST">
                         @csrf
                         @method('PUT')

                         <label for="">Student</label><br>
                         <select name="student_id" id="student_id" class="form-control">
                             @foreach($students as $student)
                               <option value="{{ $student->id}}" {{ $student->id == $mark->student_id ? 'selected' : ''}}>{{$student->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Subject</label><br>
                         <select name="subject_id" id="subject_id" class="form-control">
                             @foreach($subjects as $subject)
                               <option value="{{ $subject->id}}"  {{ $subject->id == $mark->subject_id ? 'selected' : ''}}>{{$subject->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Class</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}"  {{ $myclass->id == $mark->my_class_id ? 'selected' : ''}}>{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Section</label><br>
                         <select name="section_id" id="section_id" class="form-control">
                             @foreach($sections as $section)
                               <option value="{{ $section->id}}"  {{ $section->id == $mark->section_id ? 'selected' : ''}}>{{$section->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         <label for="">Exam</label><br>
                         <select name="exam_id" id="exam_id" class="form-control">
                             @foreach($exams as $exam)
                           <option value="{{ $exam->id}}">{{$exam->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('t1')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="t1"> T1 </label>
                         <input type="text" name="t1"  value="{{$mark->t1}}" class="form-control @error('t1') is-invalid @enderror "><br>

                         @error('t2')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="t2">T2</label>
                         <input type="text" name="t2" value="{{$mark->t2}}" class="form-control @error('t2') is-invalid @enderror "><br>
                      
                         @error('t3')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="t3">t3</t3bel>
                         <input type="text" name="t3"  value="{{$mark->t3}}" class="form-control @error('t3') is-invalid @enderror "><br>

                         @error('t4')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="t4">t4</label>
                         <input type="text" name="t4"  value="{{$mark->t4}}" class="form-control @error('t4') is-invalid @enderror "><br>

                         @error('tca')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="tca">Tca</label>
                         <input type="text" name="tca"  value="{{$mark->tca}}" class="form-control @error('tca') is-invalid @enderror "><br>     

                         @error('exm')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="age">Exm</label>
                         <input type="text" name="exm"  value="{{$mark->exm}}" class="form-control @error('exm') is-invalid @enderror "><br>

                         @error('tex1')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="tex1">Tex1</label>
                         <input type="text" name="tex1"  value="{{$mark->tex1}}" class="form-control @error('tex1') is-invalid @enderror "><br>

                         @error('tex2')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="tex2">Tex2</label>
                         <input type="text" name="tex2"  value="{{$mark->tex2}}" class="form-control @error('tex2') is-invalid @enderror "><br>

                         @error('tex3')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="tex3">Tex3</label>
                         <input type="text" name="tex3"  value="{{$mark->tex3}}" class="form-control @error('tex3') is-invalid @enderror "><br>

                         @error('sub-pos')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="sub_pos">sub pos</label>
                         <input type="text" name="sub_pos"  value="{{$mark->sub_pos}}" class="form-control @error('sub_pos') is-invalid @enderror "><br>

                         @error('cum')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="cum">Cum</label>
                         <input type="text" name="cum"  value="{{$mark->cum}}" class="form-control @error('cum') is-invalid @enderror "><br>

                         @error('cum_ave')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="cum ave">cum ave</label>
                         <input type="text" name="cum_ave"  value="{{$mark->cum_ave}}" class="form-control @error('cum_ave') is-invalid @enderror "><br>

                         <label for="">Grade</label><br>
                         <select name="grade_id" id="grade_id" class="form-control">
                             @foreach($grades as $grade)
                               <option value="{{ $grade->id}}"  {{ $grade->id == $mark->grade_id ? 'selected' : ''}}>{{$grade->name}}</option>
                             @endforeach
                         </select>
                         <br>

                         @error('year')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="year">Year</label>
                         <input type="text" name="year"  value="{{$mark->year}}" class="form-control @error('year') is-invalid @enderror "><br>

                         <button type="submit" class="btn btn-primary btn-sm">Update Mark</button>
                     </form>
                 </div>
           </div>
       </div>
@endsection
