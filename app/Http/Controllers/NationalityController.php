<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = Nationality::all();

        return view('nationalities.index')->with('nationalities', $nationalities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationalities.create');
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
            'name' => 'required|unique:nationalities',
        ]);

        $nationality = new Nationality;
        $nationality->name = $request->input('name');
        $nationality->save();

        return redirect(route('nationalities.index'))->with('success', 'Nationality Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationality = Nationality::find($id);

        return view('nationalities.edit')->with('nationality', $nationality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $nationality = Nationality::find($id);
        $nationality->name = $request->input('name');
        $nationality->save();

        return redirect(route('nationalities.index'))->with('success', 'Nationality Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $nationality = Nationalty::find($id);

        $nationality->delete();

        return redirect(route('nationalities.index'))->with('error', 'Bloodgroup Deleted Successfully !');
    }
}
