<?php

namespace App\Http\Controllers;

use App\Models\Lga;

use Illuminate\Http\Request;

class LgaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgas = Lga::all();

        return view('lgas.index')->with('lgas', $lgas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lgas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        $request->validate([
           
            'name' => 'required|unique:lgas',
        ]);

        $lga = new Lga;
        $lga->name = $request->input('name');
        $lga->save();

        return redirect(route('lgas.index'))->with('success', 'Local Government Area Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function show(Lga $lga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lga = Lga::find($id);

        return view('lgas.edit')->with('lga', $lga);
                              
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:lgas',
        ]);

        $lga = Lga::find($id);
        $lga->name = $request->input('name');
        $lga->save();

        return redirect(route('lgas.index'))->with('success', 'Local Government Area Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lga $lga)
    {
        $lga = Lga::find($id);

        $lga->delete();

        return redirect(route('lgas.index'))->with('error', 'Local Government Area  Deleted Successfully !');
    }
}
