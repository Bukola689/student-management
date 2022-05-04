<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\StudentRecord;
use App\Models\MyClass;
use App\Models\Section;
use App\Http\Requests\PromotionRequest;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();

        //dd($promotions);

        return view('promotions.index')->with('promotions', $promotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentrecords = StudentRecord::all();
        $fromclasses = MyClass::all();
        $fromsections = Section::all();
        $toclasses = MyClass::all();
        $tosections = Section::all();

        return view('promotions.create')->with('studentrecords', $studentrecords)
                                         ->with('fromclasses', $fromclasses)
                                         ->with('fromsections', $fromsections)
                                          ->with('toclasses', $toclasses)
                                         ->with('tosections', $tosections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        $request->validaated();
          // dd($request->all());
        /*  $request->validate([
            'student_record_id' => 'required',
            'from_class_id' => 'required',
            'from_section_id' => 'required',
            'to_class_id' => 'required',
            'to_section_id' => 'required',
            'grade' => 'required',
            'from_session' => 'required',
            'to_session' => 'required',
            'status' => 'required',
        ]);*/

        $promotion = new Promotion;
        $promotion->student_record_id = $request->input('student_record_id');
        $promotion->from_class_id = $request->input('from_class_id');
        $promotion->from_section_id = $request->input('from_section_id');
        $promotion->to_class_id = $request->input('to_class_id');
        $promotion->to_section_id = $request->input('to_section_id');
        $promotion->grade = $request->input('grade');
        $promotion->from_session = $request->input('from_session');
        $promotion->to_session = $request->input('to_session');
        $promotion->status = $request->input('status');
        $promotion->save();

        return redirect(route('promotions.index'))->with('success', 'promotion Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
 
        $studentrecords = StudentRecord::all();
        $fromclasses = MyClass::all();
        $fromsections = Section::all();
        $toclasses = MyClass::all();
        $tosections = Section::all();

        return view('promotions.edit')->with('promotion', $promotion)
                                       ->with('studentrecords', $studentrecords)
                                         ->with('fromclasses', $fromclasses)
                                         ->with('fromsections', $fromsections)
                                          ->with('toclasses', $toclasses)
                                         ->with('tosections', $tosections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PromotionRequest  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request, $id)
    {
        $request->validated();
         // dd($request->all());
        /* $request->validate([
            'student_record_id' => 'required',
            'from_class_id' => 'required',
            'from_section_id' => 'required',
            'to_class_id' => 'required',
            'to_section_id' => 'required',
            'grade' => 'required',
            'from_session' => 'required',
            'to_session' => 'required',
            'status' => 'required',
        ]);*/

        $promotion = Promotion::find($id);
        $promotion->student_record_id = $request->input('student_record_id');
        $promotion->from_class_id = $request->input('from_class_id');
        $promotion->from_section_id = $request->input('from_section_id');
        $promotion->to_class_id = $request->input('to_class_id');
        $promotion->to_section_id = $request->input('to_section_id');
        $promotion->grade = $request->input('grade');
        $promotion->from_session = $request->input('from_session');
        $promotion->to_session = $request->input('to_session');
        $promotion->status = $request->input('status');
        $promotion->save();

        return redirect(route('promotions.index'))->with('success', 'promotion Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $promotion = Promotion::find($id);
        
        $promotion->delete();

        return redirect(route('promotions.index'))->with('success', 'promotion Deleted Successfully !');
    }
}
