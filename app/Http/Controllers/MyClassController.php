<?php

namespace App\Http\Controllers;

use App\Models\MyClass;
use App\Models\ClassType;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myclasses = MyClass::all();

        //dd($classes);

        return view('classes.index')->with('myclasses', $myclasses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classtypes = ClassType::all();

       // dd($classtypes);

        return view('classes.create')->with('classtypes', $classtypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //  dd($request->all());
         $request->validate([
            'class_type_id' => 'required',
            'name' => 'required',
        ]);

       // dd($request->all());

        $myclass = new MyClass;
        $myclass->class_type_id = $request->input('class_type_id');
        $myclass->name = $request->input('name');
        $myclass->save();
      //  dd($myclass());

        return redirect(route('classes.index'))->with('success', 'Class Type Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show(MyClass $myClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myclass = MyClass::find($id);

        $classtype = ClassType::all();

        return view('classes.edit')->with('myclass', $myclass)
                                   ->with('classtypes', $classtype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_type_id' => 'required',
            'name' => 'required',
        ]);

        $myclass = MyClass::find($id);
        $myclass->class_type_id = $request->input('class_type_id');
        $myclass->name = $request->input('name');
        $myclass->save();

        return redirect(route('classes.index'))->with('success', 'Class Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $myclass = MyClass::find($id);

        $myclass->delete();

        return redirect(route('classes.index'))->with('error', 'Class  Deleted Successfully !');
    }
}
