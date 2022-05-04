<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\MyClass;
use App\Models\User;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myclasses = MyClass::all();

        $teachers =  User::where('user_type', 'teacher')->get();

        return view('subjects.create') ->with('myclasses', $myclasses)
                                       ->with('teachers', $teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $request->validated();
        /*$request->validate([
            'name' => 'required',
            'slug' => 'required',
            'my_class_id' => 'required',
            'staff_record_id' => 'required',
        ]);*/

        $subject = new Subject;
        $subject->name = $request->input('name');
        $subject->slug = $request->input('slug');
        $subject->my_class_id = $request->input('my_class_id');
        $subject->teacher_id = $request->input('teacher_id');
        $subject->save();

        return redirect(route('subjects.index'))->with('success', 'Subject Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);

        $myclasses = MyClass::all();
        
        $teachers =  User::where('user_type', 'teacher')->get();

        return view('subjects.edit')->with('subject', $subject) 
                                   ->with('myclasses', $myclasses)
                                   ->with('teachers', $teachers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request,$id)
    {
        $request->validated();
       /* $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'my_class_id' => 'required',
            'teacher_id' => 'required',
        // ]);*/

        $subject = Subject::find($id);
        $subject->name = $request->input('name');
        $subject->slug = $request->input('slug');
        $subject->my_class_id = $request->input('my_class_id');
        $subject->teacher_id = $request->input('teacher_id');
        $subject->save();

        return redirect(route('subjects.index'))->with('success', 'Subject Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect(route('subjects.index'))->with('success', 'Subject Deleted Successfully !');
    }
}
