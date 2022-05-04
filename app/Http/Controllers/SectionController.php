<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use App\Models\MyClass;
use App\Http\Requests\SectionRequest;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        //dd($sections);

        return view('sections.index')->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers =  User::where('user_type', 'teacher')->get();

        $myclasses = MyClass::all();

        return view('sections.create')->with('teachers', $teachers)
                                      ->with('myclasses', $myclasses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $request->validated();
       // dd($request->all());
      /*  $request->validate([
            'name' => 'required',
            'my_class_id' => 'required',
            'teacher_id' => 'required',
            'active' => 'required',
        ]);*/

        $section = new Section;
        $section->name = $request->input('name');
        $section->my_class_id = $request->input('my_class_id');
        $section->teacher_id = $request->input('teacher_id');
        $section->active = $request->input('active');
        $section->save();

        //dd($section->teacher_id);

        return redirect(route('sections.index'))->with('success', 'Section Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);

        $teachers =  User::where('user_type', 'teacher')->get()();

        $myclasses = MyClass::all();

        return view('sections.edit')->with('section', $section)->with('teachers', $teachers)->with('myclasses', $myclasses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, $id)
    {
        $request->validated();
     /*   $request->validate([
            'name' => 'required',
            'my_class_id' => 'required',
            'teacher_id' => 'required',
            'active' => 'required',
        ]); */

        $section = Section::find($id);
        $section->name = $request->input('name');
        $section->my_class_id = $request->input('my_class_id');
        $section->teacher_id = $request->input('teacher_id');
        $section->active = $request->input('active');
        $section->save();

        return redirect(route('sections.index'))->with('success', 'Section Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);

        $section->delete();

        return redirect(route('sections.index'))->with('error', 'Section  Deleted Successfully !');
    }
}
