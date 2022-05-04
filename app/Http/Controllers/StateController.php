<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Lga;
use App\Http\Requests\StateRequest;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();

        return view('states.index')->with('states', $states);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lgas = Lga::all();

        return view('states.create')->with('lgas', $lgas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
         $request->validated();

        $state = new State;
        $state->lga_id = $request->input('lga_id');
        $state->name = $request->input('name');
        $state->save(); 

        return redirect(route('states.index'))->with('success', 'Local Government Area Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show(state $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);

        $lgas = Lga::all();

        return view('states.edit')->with('state', $state)
                                        ->with('lgas', $lgas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, $id)
    {
         $request->validated();

        $state = State::find($id);
        $state->lga_id = $request->input('lga_id');
        $state->name = $request->input('name');
        $state->save();

        return redirect(route('states.index'))->with('success', 'Local Government Area Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);

        $state->delete();

        return redirect(route('states.index'))->with('error', 'Local Government Area  Deleted Successfully !');
    }
}
