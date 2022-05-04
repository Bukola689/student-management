<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\User;
use Illuminate\Http\Request;

class PinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pins = Pin::all();

        //dd($pins);

        return view('pins.index')->with('pins', $pins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $students = User::all();

        return view('pins.create')->with('users', $users)->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request->all());
         $request->validate([
            'code' => 'required',
            'used' => 'required',
            'times_used' => 'required',
            'user_id' => 'required',
            'student_id' => 'required',
        ]);

        $pin = new Pin;
        $pin->code = $request->input('code');
        $pin->used = $request->input('used');
        $pin->times_used = $request->input('times_used');
        $pin->user_id = $request->input('user_id');
        $pin->student_id = $request->input('student_id');
        $pin->save();

        return redirect(route('pins.index'))->with('success', 'pin Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function show(Pin $pin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $pin = Pin::find($id);
        
        $users = User::all();
 
        $students = User::all();

        return view('pins.edit')->with('pin', $pin)
                                ->with('users', $users)
                                ->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // dd($request->all());
         $request->validate([
            'code' => 'required',
            'used' => 'required',
            'times_used' => 'required',
            'user_id' => 'required',
            'student_id' => 'required',
        ]);

        $pin = Pin::find($id);
        $pin->code = $request->input('code');
        $pin->used = $request->input('used');
        $pin->times_used = $request->input('times_used');
        $pin->user_id = $request->input('user_id');
        $pin->student_id = $request->input('student_id');
        $pin->save();

        return redirect(route('pins.index'))->with('success', 'pin Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pin = Pin::find($id);
        
        $pin->delete();

        return redirect(route('pins.index'))->with('success', 'pin Deleted Successfully !');
    }
}
