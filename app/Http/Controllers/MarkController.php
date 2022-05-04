<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\User;
use App\Models\MyClass;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Exam;
use App\Models\Grade;
use App\Http\Requests\MarkRequest;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();

        return view('marks.index')->with('marks', $marks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $students = User::all();

       $students = User::where('user_type', 'student')->get();
       
        $subjects = Subject::all();
       
        $myclasses = MyClass::all();
       
        $sections = Section::all();
       
        $exams = Exam::all();
       
        $grades = Grade::all();

        return view('marks.create')->with('students', $students)
                                   ->with('subjects', $subjects)
                                   ->with('myclasses', $myclasses)
                                   ->with('sections', $sections)
                                   ->with('exams', $exams)
                                   ->with('grades', $grades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $request->validated();
          //  dd($request->all());
      /*    $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'my_class_id' => 'required',
            'section_id' => 'required',
            'exam_id' => 'required',
            't1' => 'required',
            't2' => 'required',
            't3' => 'required',
            't4' => 'required',
            'tca' => 'required',
            'exm' => 'required',
            'tex1' => 'required',
            'tex2' => 'required',
            'tex3' => 'required',
            'sub_pos' => 'required',
            'cum' => 'required',
            'cum_ave' => 'required',
            'grade_id' => 'required',
            'year' => 'required',
        ]);
        */

        $mark = new Mark;
        $mark->student_id = $request->input('student_id');
        $mark->subject_id = $request->input('subject_id');
        $mark->my_class_id = $request->input('my_class_id');
        $mark->section_id = $request->input('section_id');
        $mark->exam_id = $request->input('exam_id');
        $mark->t1 = $request->input('t1');
        $mark->t2 = $request->input('t2');
        $mark->t3 = $request->input('t3');
        $mark->t4 = $request->input('t4');
        $mark->tca = $request->input('tca');
        $mark->exm = $request->input('exm');
        $mark->tex1= $request->input('tex1');
        $mark->tex2 = $request->input('tex2');
        $mark->tex3 = $request->input('tex3');
        $mark->sub_pos = $request->input('sub_pos');
        $mark->cum = $request->input('cum');
        $mark->cum_ave = $request->input('cum_ave');
        $mark->grade_id = $request->input('grade_id');
        $mark->year = $request->input('year');
        $mark->save();

        return redirect(route('marks.index'))->with('success', 'Mark Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        return view('marks.show')->with('mark', $mark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);
        $students =  User::where('user_type', 'student')->get();
        $subjects = Subject::all();
        $myclasses = MyClass::all();
        $sections = Section::all();
        $exams = Exam::all();
        $grades = Grade::all();

        return view('marks.edit')->with('mark', $mark)->with('students', $students)
                                 ->with('subjects', $subjects)
                                 ->with('myclasses', $myclasses)
                                 ->with('sections', $sections)
                                 ->with('exams', $exams)
                                 ->with('grades', $grades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(MarkRequest $request, $id)
    {
        $request->validated();
            //  dd($request->all());
       /*     $request->validate([
                'student_id' => 'required',
                'subject_id' => 'required',
                'my_class_id' => 'required',
                'section_id' => 'required',
                'exam_id' => 'required',
                't1' => 'required',
                't2' => 'required',
                't3' => 'required',
                't4' => 'required',
                'tca' => 'required',
                'exm' => 'required',
                'tex1' => 'required',
                'tex2' => 'required',
                'tex3' => 'required',
                'sub_pos' => 'required',
                'cum' => 'required',
                'cum_ave' => 'required',
                'grade_id' => 'required',
                'year' => 'required',
            ]);*/
    
            $mark = Mark::find($id);
            $mark->student_id = $request->input('student_id');
            $mark->subject_id = $request->input('subject_id');
            $mark->my_class_id = $request->input('my_class_id');
            $mark->section_id = $request->input('section_id');
            $mark->exam_id = $request->input('exam_id');
            $mark->t1 = $request->input('t1');
            $mark->t2 = $request->input('t2');
            $mark->t3 = $request->input('t3');
            $mark->t4 = $request->input('t4');
            $mark->tca = $request->input('tca');
            $mark->exm = $request->input('exm');
            $mark->tex1= $request->input('tex1');
            $mark->tex2 = $request->input('tex2');
            $mark->tex3 = $request->input('tex3');
            $mark->sub_pos = $request->input('sub_pos');
            $mark->cum = $request->input('cum');
            $mark->cum_ave = $request->input('cum_ave');
            $mark->grade_id = $request->input('grade_id');
            $mark->year = $request->input('year');
            $mark->save();
    
            return redirect(route('marks.index'))->with('success', 'Mark Saved Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();

        return redirect(route('marks.index'))->with('success', 'Mark Deleted Successfully !');
    }
}
