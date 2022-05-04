<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();

        return view('exams.index')->with('exams', $exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'term' => 'required',
            'year' => 'required',
        ]);

        $exam = new Exam;
        $exam->name = $request->input('name');
        $exam->term = $request->input('term');
        $exam->year = $request->input('year');
        $exam->save();
       // dd($exam);

        return redirect(route('exams.index'))->with('success', 'exams Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);

        return view('exams.edit')->with('exam', $exam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'term' => 'required',
            'year' => 'required',
        ]);

        $exam = Exam::find($id);
        $exam->name = $request->input('name');
        $exam->term = $request->input('term');
        $exam->year = $request->input('year');
        $exam->save();

        return redirect(route('exams.index'))->with('success', 'exams updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        
        $exam->delete();

        return redirect(route('exams.index'))->with('error', 'exams Deleted Successfully !');
    }
}
