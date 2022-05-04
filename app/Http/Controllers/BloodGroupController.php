<?php

namespace App\Http\Controllers;

use App\Models\Blood_group;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodgroups = Blood_group::all();

        return view('bloodgroups.index')->with('bloodgroups', $bloodgroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bloodgroups.create');
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
            'name' => new Uppercase,
        ]);

        $bloodgroup = new Blood_group;
        $bloodgroup->name = $request->input('name');
        $bloodgroup->save();

        return redirect(route('bloodgroups.index'))->with('success', 'Bloodgroup Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blood_group  $blood_group
     * @return \Illuminate\Http\Response
     */
    public function show(Blood_group $blood_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blood_group  $blood_group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodgroup = Blood_group::find($id);

        return view('bloodgroups.edit')->with('bloodgroup', $bloodgroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blood_group  $blood_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
        ]);

        $bloodgroup = Blood_group::find($id);
        $bloodgroup->name = $request->input('name');
        $bloodgroup->save();

        return redirect(route('bloodgroups.index'))->with('success', 'Bloodgroup Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blood_group  $blood_group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bloodgroup = Blood_group::find($id);

        $bloodgroup->delete();

        return redirect(route('bloodgroups.index'))->with('error', 'Bloodgroup Deleted Successfully !');
    }
}
