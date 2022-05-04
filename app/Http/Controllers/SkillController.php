<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();

        return view('skills.index')->with('skills',$skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
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
            'skill_type' => 'required',
            'class_type' => 'required',
        ]);

        $skill = new Skill;
        $skill->name = $request->input('name');
        $skill->skill_type = $request->input('skill_type');
        $skill->class_type = $request->input('class_type');
        $skill->save();

        return redirect(route('skills.index'))->with('success', 'Skill Added SUccessfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        
        return view('skills.edit')->with('skill', $skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'skill_type' => 'required',
            'class_type' => 'required',
        ]);

        $skill = Skill::find($id);
        $skill->name = $request->input('name');
        $skill->skill_type = $request->input('skill_type');
        $skill->class_type = $request->input('class_type');
        $skill->save();

        return redirect(route('skills.index'))->with('suucess', 'Skills Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->save();

        return redirect(route('skills.index'))->with('suucess', 'Skills Deleted Successfully');
    }
}
