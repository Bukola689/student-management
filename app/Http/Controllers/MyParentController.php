<?php

namespace App\Http\Controllers;

use App\Models\MyParent;
use Illuminate\Http\Request;

class MyParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myparents = MyParent::all();

        return view('myparents.index')->with('myparents', $myparents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myparents.index')->with('myparents', $myparents);
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

        $myparent = new MyParent;
        $myparent->name = $request->input('name');
        $myparent->save();

        return redirect(route('myparents.index'))->with('success', 'Class Type Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function show(MyParent $myParent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $myparent = MyParent::find($id);

        return view('myparents.edit')->with('myparent', $myparent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'class_type_id' => 'required',
            'name' => 'required',
        ]);

        $myparent = MyParent::find($id);
        $myparent->name = $request->input('name');
        $myparent->save();

        return redirect(route('myparents.index'))->with('success', 'Class Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyParent  $myParent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myparent = MyParent::find($id);

        $myparent->delete();

        return redirect(route('myparents.index'))->with('error', 'Class  Deleted Successfully !');
    }
}
