<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();

        return view('attendances.index')->with('attendances', $attendances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students =  User::where('user_type', 'student')->get();

        return view('attendances.create')->with('students', $students);
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
            'attendance_date' => 'required',
            'student_id' => 'required',
            'remark' => 'required',
            'status' => 'required',
           
        ]);

        $attendance = new Attendance;
        $attendance->attendance_date = $request->input('attendance_date');
        $attendance->student_id = $request->input('student_id');
        $attendance->remark = $request->input('remark');
        $attendance->status = $request->input('status');
        $attendance->save();

        return redirect(route('attendances.index'))->with('success', 'Attendance Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::find($id);

        $students =  User::where('user_type', 'student')->get()();

        return view('attendances.edit')->with('attendance', $attendance)
                                        ->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'attendance_date' => 'required',
            'student_id' => 'required',
            'remark' => 'required',
            'status' => 'required',      
        ]);

        $attendance = Attendance::find($id);
        $attendance->attendance_date = $request->input('attendance_date');
        $attendance->student_id = $request->input('student_id');
        $attendance->remark = $request->input('remark');
        $attendance->status = $request->input('status');
        $attendance->save();

        return redirect(route('attendances.index'))->with('success', 'Attendance Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);

        $attendance->delete();

        return redirect(route('attendances.index'))->with('success', 'Attendance Deleted Successfully !');
    }
}
