<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request->all());
      /*  $request->validate([
            'photo' => 'required',
            'name' => 'required',
            'user_type' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);*/

        $teacher = new Teacher;
        $teacher->photo = $request->input('photo');
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->username = $request->input('username');
        $teacher->dob = $request->input('dob');
        $teacher->gender = $request->input('gender');
        $teacher->phone = $request->input('phone');
        $teacher->phone2 = $request->input('phone2');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->save();

        return redirect(route('teachers.index'))->with('success', 'teacher Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teachers.show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teachers.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         // dd($request->all());
      /*  $request->validate([
            'photo' => 'required',
            'name' => 'required',
            'user_type' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);*/

        $teacher = Teacher::find($id);
        $teacher->photo = $request->input('photo');
        $teacher->name = $request->input('name');
        $teacher->dob = $request->input('dob');
        $teacher->gender = $request->input('gender');
        $teacher->phone = $request->input('phone');
        $teacher->phone2 = $request->input('phone2');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->save();

        return redirect(route('teachers.index'))->with('success', 'teacher Created Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        $teacher->delete();

        return redirect(route('teachers.index'))->with('error', 'Teacher Deleted Successfully !');
    }
}
