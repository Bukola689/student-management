<?php

namespace App\Http\Controllers;

use App\Models\StudentRecord;
use App\Models\User;
use App\Models\MyClass;
use App\Models\Section;
//use App\Models\User;
use App\Models\Dorm;
use Illuminate\Http\Request;

class StudentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentrecords = StudentRecord::all();

       // dd($studentrecords);

        return view('studentrecords.index')->with('studentrecords', $studentrecords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $myclasses = MyClass::all();

        $sections = Section::all();

        $myparents =  User::where('user_type', 'parent')->get();

        $dorms = Dorm::all();

        return view('studentrecords.create')->with('users, $users')
                                   ->with('myclasses', $myclasses)
                                   ->with('sections', $sections)
                                   ->with('myparents', $myparents)
                                   ->with('dorms', $dorms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $request->validated();
       
         // dd($request->all());
       /* $request->validate([
            'user_id' => 'required',
            'my_classid' => 'required',
            'section_id' => 'required',
            'adm_no' => 'required',
            'parent_id' => 'required',
            'dorm_id' => 'required',
            'dorm_room_no' => 'required',
            'sessiom' => 'required',
            'house' => 'required',
            'age' => 'required',
            'year_admitted' => 'required',
            'grad' => 'required',
            'grad_date' => 'required',
        ]);*/

        $studentrecord = new StudentRecord;
        $studentrecord->my_class_id = $request->input('my_class_id');
        $studentrecord->section_id = $request->input('section_id');
        $studentrecord->adm_no = $request->input('adm_no');
        $studentrecord->my_parent_id = $request->input('my_parent_id');
        $studentrecord->dorm_id = $request->input('dorm_id');
        $studentrecord->dorm_room_no = $request->input('dorm_room_no');
        $studentrecord->session = $request->input('session');
        $studentrecord->house = $request->input('house');
        $studentrecord->age = $request->input('age');
        $studentrecord->year_admitted = $request->input('year_admitted');
        $studentrecord->grad = $request->input('grad');
        $studentrecord->grad_date = $request->input('grad_date');
        $studentrecord->save();
        //dd($studentrecord->save());

        return redirect(route('studentrecords.index'))->with('success', 'StudentRecord Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRecord $studentRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentrecord = StudentRecord::find($id);

        $users = User::all();

        $myclasses = MyClass::all();

        $sections = Section::all();

        $myparents =  User::where('user_type', 'parent')->get();

        $dorms = Dorm::all();

        return view('studentrecords.edit')->with('studentrecord', $studentrecord)
                                          ->with('users', $users)
                                          ->with('myclasses', $myclasses)
                                          ->with('sections', $sections)
                                          ->with('myparents', $myparents)
                                          ->with('dorms', $dorms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request,  $id)
    {
        $request->validated();
            // dd($request->all());
       /* $request->validate([
            'user_id' => 'required',
            'my_classid' => 'required',
            'section_id' => 'required',
            'adm_no' => 'required',
            'my_parent_id' => 'required',
            'dorm_id' => 'required',
            'dorm_room_no' => 'required',
            'sessiom' => 'required',
            'house' => 'required',
            'age' => 'required',
            'year_admitted' => 'required',
            'grad' => 'required',
            'grad_date' => 'required',
        ]);*/

        $studentrecord = StudentRecord::find($id);
        $studentrecord->user_id = $request->input('user_id');
        $studentrecord->my_class_id = $request->input('my_class_id');
        $studentrecord->section_id = $request->input('section_id');
        $studentrecord->adm_no = $request->input('adm_no');
        $studentrecord->my_parent_id = $request->input('my_parent_id');
        $studentrecord->dorm_id = $request->input('dorm_id');
        $studentrecord->dorm_room_no = $request->input('dorm_room_no');
        $studentrecord->session = $request->input('session');
        $studentrecord->house = $request->input('house');
        $studentrecord->age = $request->input('age');
        $studentrecord->year_admitted = $request->input('year_admitted');
        $studentrecord->grad = $request->input('grad');
        $studentrecord->grad_date = $request->input('grad_date');
        $studentrecord->save();
   //     dd($student->save());

        return redirect(route('studentrecords.index'))->with('success', 'StudentRecord Created Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $studentrecord = StudentRecord::find($id);

        $studentrecord->delete();

        return redirect(route('studentrecords.index'))->with('error', 'StudentRecord Deleted Successfully !');
    }
}
