<?php

namespace App\Http\Controllers;

use App\Models\ExamRecord;
use App\Models\User;
use App\Models\Exam;
use App\Models\MyClass;
use App\Models\Section;
use App\Http\Requests\ExamRecordRequest;
use Illuminate\Http\Request;

class ExamRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examRecords = ExamRecord::all();

        //dd($examRecords);

        return view('examrecords.index')->with('examRecords', $examRecords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students =  User::where('user_type', 'student')->get();
        $exams = Exam::all();
        $myclasses = MyClass::all();
        $sections = Section::all();

        return view('examrecords.create')->with('students', $students)
                                         ->with('exams', $exams)
                                         ->with('myclasses', $myclasses)
                                         ->with('sections', $sections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRecordRequest $request)
    {
          //  dd($request->all());
     /*     $request->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
            'my_class_id' => 'required',
            'section_id' => 'required',
            'total' => 'required',
            'average' => 'required',
            'class_average' => 'required',
            'position' => 'required',
            'af' => 'required',
            'ps' => 'required',
            'p_comment' => 'required',
            't_comment' => 'required',
            'year' => 'required',
        ]);
        */

        $examRecord = new ExamRecord;
        $examRecord->student_id = $request->input('student_id');
        $examRecord->exam_id = $request->input('exam_id');
        $examRecord->my_class_id = $request->input('my_class_id');
        $examRecord->section_id = $request->input('section_id');
        $examRecord->total = $request->input('total');
        $examRecord->average = $request->input('average');
        $examRecord->class_average = $request->input('class_average');
        $examRecord->position = $request->input('position');
        $examRecord->af = $request->input('af');
        $examRecord->ps = $request->input('ps');
        $examRecord->p_comment= $request->input('p_comment');
        $examRecord->t_comment = $request->input('t_comment');
        $examRecord->year = $request->input('year');
        $examRecord->save();

        return redirect(route('examrecords.index'))->with('success', 'Exam Record Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamRecord  $examRecord
     * @return \Illuminate\Http\Response
     */
    public function show(ExamRecord $examRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamRecord  $examRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $examrecord = ExamRecord::find($id);

        $students =  User::where('user_type', 'student')->get();
        
        $exams = Exam::all();
        
        $myclasses = MyClass::all();
        
        $sections = Section::all();

        return view('examrecords.edit')->with('examrecord', $examrecord)
                                       ->with('students', $students)
                                       ->with('exams', $exams)
                                       ->with('myclasses', $myclasses)
                                        ->with('sections', $sections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamRecord  $examRecord
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRecordRequest $request, $id)
    {
           //  dd($request->all());
        /*   $request->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
            'my_class_id' => 'required',
            'section_id' => 'required',
            'total' => 'required',
            'average' => 'required',
            'class_average' => 'required',
            'position' => 'required',
            'af' => 'required',
            'ps' => 'required',
            'p_comment' => 'required',
            't_comment' => 'required',
            'year' => 'required',
        ]); */

        $examrecord = ExamRecord::find($id);
        $examrecord->student_id = $request->input('student_id');
        $examrecord->exam_id = $request->input('exam_id');
        $examrecord->my_class_id = $request->input('my_class_id');
        $examrecord->section_id = $request->input('section_id');
        $examrecord->total = $request->input('total');
        $examrecord->average = $request->input('average');
        $examrecord->class_average = $request->input('class_average');
        $examrecord->position = $request->input('position');
        $examrecord->af = $request->input('af');
        $examrecord->ps = $request->input('ps');
        $examrecord->p_comment = $request->input('p_comment');
        $examrecord->t_comment = $request->input('t_comment');
        $examrecord->year = $request->input('year');
        $examrecord->save();

        return redirect(route('examrecords.index'))->with('success', 'Exam Record Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamRecord  $examRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examrecord = ExamRecord::find($id);

        $examrecord->delete();

        return redirect(route('examrecords.index'))->with('success', 'Exam Record Updated Successfully !');
    }
}
