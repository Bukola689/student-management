<?php

namespace App\Http\Controllers;

use App\Models\TimeTable;
use App\Models\TimeTableRecord;
use App\Models\TimeSlot;
use App\Models\Subject;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetables = TimeTable::all();

        return view('timetables.index')->with('timetables', $timetables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeslots = TimeSlot::all();

        $timetablerecords = TimeTableRecord::all();

        $subjects = Subject::all();

        return view('timetables.create')->with('timetablerecords', $timetablerecords)
                                        ->with('timeslots', $timeslots)
                                        ->with('subjects', $subjects);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'time_table_record_id' => 'required',
            'time_slot_id' => 'required',
            'exam_date' => 'required',
            'day' => 'required',
            'timestamp_from' => 'required',
            'timestamp_to' => 'required',
            'subject_id' => 'required',
        ]);

        $timetable = new TimeTable;
        $timetable->time_table_record_id = $request->input('time_table_record_id');
        $timetable->time_slot_id = $request->input('time_slot_id');
        $timetable->exam_date = $request->input('exam_date');
        $timetable->day = $request->input('day');
        $timetable->timestamp_from = $request->input('timestamp_from');
        $timetable->timestamp_to = $request->input('timestamp_to');
        $timetable->subject_id = $request->input('subject_id');
        $timetable->save();

        return redirect(route('timetables.index'))->with('success', 'timetable Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTable $timeTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timetable = TimeTable::find($id);

        $timeslots = TimeSlot::all();

        $timetablerecords = TimeTableRecord::all();

        $subjects = Subject::all();


        return view('timetables.edit')->with('timetable', $timetable)
                                      ->with('timeslots', $timeslots)
                                      ->with('timetablerecords', $timetablerecords)
                                      ->with('subjects', $subjects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'time_table_record_id' => 'required',
            'time_slot_id' => 'required',
            'exam_date' => 'required',
            'day' => 'required',
            'timestamp_from' => 'required',
            'timestamp_to' => 'required',
            'subject_id' => 'required',
        ]);

        $timetable = TimeTable::find($id);
        $timetable->time_table_record_id = $request->input('time_table_record_id');
        $timetable->time_slot_id = $request->input('time_slot_id');
        $timetable->exam_date = $request->input('exam_date');
        $timetable->day = $request->input('day');
        $timetable->timestamp_from = $request->input('timestamp_from');
        $timetable->timestamp_to = $request->input('timestamp_to');
        $timetable->subject_id = $request->input('subject_id');
        $timetable->save();

        return redirect(route('timetables.index'))->with('success', 'timetable updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = TimeTable::find($id);

        $timetable->delete();

        return redirect(route('timetables.index'))->with('success', 'Timetable Deleted Successfully !');
    }
}
