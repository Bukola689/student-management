<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\ClassType;
use App\Http\Requests\GradeRequest;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        return view('grades.index')->with('grades',$grades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classtypes = ClassType::all();

        return view('grades.create')->with('classtypes', $classtypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {
        $request->validated();
      /*  $request->validate([
            'name' => 'required',
            'class_type_id' => 'required',
            'mark_from' => 'required',
            'mark_to' => 'required',
            'remark' => 'required',
        ]);
        */

        $grade = new Grade;
        $grade->name = $request->input('name');
        $grade->class_type_id = $request->input('class_type_id');
        $grade->mark_from = $request->input('mark_from');
        $grade->mark_to = $request->input('mark_to');
        $grade->remark= $request->input('remark');
        $grade->save();
       // dd($grade->classtype());

        return redirect(route('grades.index'))->with('success','Grade Saved Successfully !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);

        $classtypes = ClassType::all();

        return view('grades.edit')->with('grade', $grade)
                                  ->with('classtypes', $classtypes);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request, $id)
    {
        $request->validated();

        $grade = Grade::find($id);
        $grade->name = $request->input('name');
        $grade->class_type_id = $request->input('class_type_id');
        $grade->mark_from = $request->input('mark_from');
        $grade->mark_to = $request->input('mark_to');
        $grade->remark= $request->input('remark');
        $grade->save();

        return redirect(route('grades.index'))->with('succ', 'Grade Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect(route('grades.index'))->with('success', 'Grade deleted successfully');
    }
}
