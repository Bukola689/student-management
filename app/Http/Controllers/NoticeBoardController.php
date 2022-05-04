<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeboards = NoticeBoard::all();

        return view('noticeboards.index')->with('noticeboards', $noticeboards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticeboards.create');
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
            'title' => 'required',
            'description' => 'required',
            'board_date' => 'required',
        ]);

        $noticeboard = new NoticeBoard;
        $noticeboard->title = $request->input('title');
        $noticeboard->description = $request->input('description');
        $noticeboard->board_date = $request->input('board_date');
        $noticeboard->save();

        return redirect(route('noticeboards.index'))->with('success', 'Notice Board Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeBoard $noticeBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticeboard = NoticeBoard::find($id);

        $myclasses = MyClass::all();

        return view('noticeboards.edit')->with('noticeboard', $noticeboard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'board_date' => 'required',
        ]);

        $noticeboard = NoticeBoard::find($id);
        $noticeboard->title = $request->input('title');
        $noticeboard->description = $request->input('description');
        $noticeboard->board_date = $request->input('board_date');
        $noticeboard->save();

        return redirect(route('noticeboards.index'))->with('success', 'Notice Board Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticeboard = NoticeBoard::find($id);

        $noticeboard->delete();

        return redirect(route('noticeboards.index'))->with('error', 'Notice Board Updated Successfully');


    }
}
