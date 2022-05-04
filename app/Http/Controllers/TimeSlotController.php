<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\TimeTableRecord;
use App\Http\Requests\TimeSlotRequest;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = TimeSlot::all();

        return view('timeslots.index')->with('timeslots', $timeslots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timetablerecords = TimeTableRecord::all();

        return view('timeslots.create') ->with('timetablerecords', $timetablerecords);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeSlotRequest $request)
    {
      /*  $request->validate([
            'time_table_record_id' => 'required',
            'timestamp_from' => 'required',
            'timestamp_to' => 'required',
            'full' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'hour_from' => 'required',
            'min_from' => 'required',
            'meridian_from' => 'required',
            'hour_to' => 'required',
            'min_to' => 'required',
            'meridian_to' => 'required',
        ]);*/

        $timeslot = new TimeSlot;
        $timeslot->time_table_record_id = $request->input('time_table_record_id');
        $timeslot->timestamp_from = $request->input('timestamp_from');
        $timeslot->timestamp_to = $request->input('timestamp_to');
        $timeslot->full = $request->input('full');
        $timeslot->time_from = $request->input('time_from');
        $timeslot->time_to = $request->input('time_to');
        $timeslot->hour_from = $request->input('hour_from');
        $timeslot->min_from = $request->input('min_from');
        $timeslot->meridian_from = $request->input('meridian_from');
        $timeslot->hour_to = $request->input('hour_to');
        $timeslot->min_to = $request->input('min_to');
        $timeslot->meridian_to = $request->input('meridian_to');
        $timeslot->save();

        return redirect(route('timeslots.index'))->with('success', 'timeslot Created Successfully !');
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
        $timeslot = TimeSlot::find($id);

        $timetablerecords = TimeTableRecord::all();

        return view('timeslots.edit')->with('timeslot', $timeslot)
                                     ->with('timetablerecords', $timetablerecords);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeSlotRequest $request, $id)
    {
      /*  $request->validate([
            'time_table_record_id' => 'required',
            'timestamp_from' => 'required',
            'timestamp_to' => 'required',
            'full' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'hour_from' => 'required',
            'min_from' => 'required',
            'meridian_from' => 'required',
            'hour_to' => 'required',
            'min_to' => 'required',
            'meridian_to' => 'required',
        ]); */

        $timeslot = TimeSlot::find($id);
        $timeslot->time_table_record_id = $request->input('time_table_record_id');
        $timeslot->timestamp_from = $request->input('timestamp_from');
        $timeslot->timestamp_to = $request->input('timestamp_to');
        $timeslot->full = $request->input('full');
        $timeslot->time_from = $request->input('time_from');
        $timeslot->time_to = $request->input('time_to');
        $timeslot->hour_from = $request->input('hour_from');
        $timeslot->min_from = $request->input('min_from');
        $timeslot->meridian_from = $request->input('meridian_from');
        $timeslot->hour_to = $request->input('hour_to');
        $timeslot->min_to = $request->input('min_to');
        $timeslot->meridian_to = $request->input('meridian_to');
        $timeslot->save();

        return redirect(route('timeslots.index'))->with('success', 'timeslot updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeslot = TimeTable::find($id);

        $timeslot->delete();

        return redirect(route('timeslots.index'))->with('success', 'Timetable Deleted Successfully !');
    }
}
