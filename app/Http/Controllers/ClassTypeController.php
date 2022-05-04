<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;

class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classtypes = ClassType::all();

        return view('classtypes.index')->with('classtypes', $classtypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classtypes.create');
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
            'name' => 'required',
            'code' => 'required',
        ]);

        $classtype = new ClassType;
        $classtype->name = $request->input('name');
        $classtype->code = $request->input('code');
        $classtype->save();

        return redirect(route('classtypes.index'))->with('success', 'Class Type Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function show(ClassType $classType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $classtype = ClassType::find($id);

        return view('classtypes.edit')->with('classtype', $classtype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $classtype = ClassType::find($id);
        $classtype->name = $request->input('name');
        $classtype->code = $request->input('code');
        $classtype->save();

        return redirect(route('classtypes.index'))->with('success', 'Class Type Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $classtype = ClassType::find($id);

        $classtype->delete();

        return redirect(route('classtypes.index'))->with('error', 'Class Type  Deleted Successfully !');
    }
}
