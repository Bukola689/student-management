<?php

namespace App\Http\Controllers;

use App\Models\Dorm;
use Illuminate\Http\Request;

class DormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dorms = Dorm::all();

        return view('dorms.index')->with('dorms', $dorms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dorms.create');
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
            'description' => 'required'
        ]);
        

        $dorm = new Dorm;
        $dorm->name = $request->input('name');
        $dorm->description = $request->input('description');
        $dorm->save();

        return redirect(route('dorms.index'))->with('success', 'Dorm Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dorm  $dorm
     * @return \Illuminate\Http\Response
     */
    public function show(Dorm $dorm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dorm  $dorm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dorm = Dorm::find($id);

        return view('dorms.edit')->with('dorm', $dorm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dorm  $dorm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $dorm = Dorm::find($id);
        $dorm->name = $request->input('name');
        $dorm->description = $request->input('description');
        $dorm->save();

        return redirect(route('dorms.index'))->with('success', 'Dorm Created Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dorm  $dorm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dorm = Dorm::find($id);

        $dorm->delete();

        return redirect(route('dorms.index'))->with('error', 'Dorms  Deleted Successfully !');
    }
}
