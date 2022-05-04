<?php

namespace App\Http\Controllers;

use App\Models\TimeTableRecord;
use App\Models\MyClass;
use App\Models\Exam;
use App\Http\Requests\TimeTableRecordRequest;
use Illuminate\Http\Request;


class TimeTableRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetablerecords = TimeTableRecord::all();

        return view('timetablerecords.index')->with('timetablerecords', $timetablerecords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myclasses = MyClass::all();

        $exams = Exam::all();

        return view('timetablerecords.create')->with('myclasses', $myclasses)
                                               ->with('exams', $exams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeTableRecordRequest $request)
    {
         $request->validated();
       // dd($request->all());
      /*  $request->validate([
            'name' => 'required',
            'my_class_id' => 'required',
            'exam_id' => 'required',
            'year' => 'required',
           
        ]); */

        $timetable = new TimeTableRecord;
        $timetable->name = $request->input('name');
        $timetable->my_class_id = $request->input('my_class_id');
        $timetable->exam_id = $request->input('exam_id');
        $timetable->year = $request->input('year');
        $timetable->save();

        return redirect(route('timetablerecords.index'))->with('success', 'timetable Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timetablerecord = TimeTableRecord::find($id);

        $myclasses = MyClass::all();

        $exams = Exam::all();

        return view('timetablerecords.edit')->with('timetablerecord', $timetablerecord)
                                             ->with('myclasses', $myclasses)
                                             ->with('exams', $exams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeTableRecordRequest $request, $id)
    {
        $request->validated();
      /*  $request->validate([
            'name' => 'required',
            'my_class_id' => 'required',
            'exam_id' => 'required',
            'year' => 'required',
        ]);*/

        $timetablerecord = TimeTableRecord::find($id);
        $timetablerecord->name = $request->input('name');
        $timetablerecord->my_class_id = $request->input('my_class_id');
        $timetablerecord->exam_id = $request->input('exam_id');
        $timetablerecord->year = $request->input('year');
        $timetablerecord->save();

        return redirect(route('timetablerecords.index'))->with('success', 'timetable updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = TimeTableRecord::find($id);

        $timetable->delete();

        return redirect(route('timetablerecords.index'))->with('success', 'Timetable Deleted Successfully !');
    }
}
