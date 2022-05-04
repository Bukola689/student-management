<?php

namespace App\Http\Controllers;

use App\Models\StaffRecord;
use App\Models\User;
use App\Http\Requests\StaffRecordRequest;
use Illuminate\Http\Request;

class StaffRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffRecords = StaffRecord::all();

        return view('staffrecords.index')->with('staffRecords',$staffRecords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('staffrecords.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
       /* $request->validate([
            'user_id' => 'required',
            'code' => 'required',
            'emp-date' => 'required',
        ]);*/

        $staffRecord = new StaffRecord;
        $staffRecord->user_id = $request->input('user_id');
        $staffRecord->code = $request->input('code');
        $staffRecord->emp_date = $request->input('emp_date');
        $staffRecord->save();

        return redirect(route('staffrecords.index'))->with('success', 'staffRecord Added SUccessfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffRecord  $staffRecord
     * @return \Illuminate\Http\Response
     */
    public function show(StaffRecord $staffRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffRecord  $staffRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffrecord = StaffRecord::find($id);

        $users = User::all();
        
        return view('staffrecords.edit')->with('staffrecord', $staffrecord)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffRecord  $staffRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validated();
      /*  $request->validate([
            'user_id' => 'required',
            'code' => 'required',
            'emp-date' => 'required',
        ]); */

        $staffRecord = StaffRecord::find($id);
        $staffRecord->user_id = $request->input('user_id');
        $staffRecord->code = $request->input('code');
        $staffRecord->emp_date = $request->input('emp_date');
        $staffRecord->save();

        return redirect(route('staffrecords.index'))->with('success', 'staffRecord Update SUccessfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffRecord  $staffRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staffrecord = StaffRecord::find($id);
        
        $staffrecord->delete();

        return redirect(route('staffrecords.index'))->with('success', 'staffRecord Deleted SUccessfully' );
    }
}
