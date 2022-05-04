<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blood_group;
use App\Models\State;
use App\Models\Lga;
use App\Models\Nationality;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodgroups = Blood_group::all();

        $states = State::all();

        $lgas = Lga::all();

        $nationalities = Nationality::all();

        return view('profiles.index')->with('bloodgroups', $bloodgroups)
                                 ->with('states', $states)
                                 ->with('lgas', $lgas)
                                 ->with('nationalities', $nationalities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

 /*  $request->validate([
            'name' => 'required',
            'email' => 'required',
            
           // 'user_type' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'photo' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
            'blood_group_id' => 'required',
            'state_id' => 'required',
            'lga_id' => 'required',
            'nationality_id' => 'required',
            'address' => 'required',
            'password' => 'required',

        ]);*/

        if( $request->hasFile('photo')) {

            $photo = $request->photo;

            $originalName = $photo->getClientOriginalName();
    
            $photo_new_name = 'photo-' .time() .  '-' .$originalName;
    
            $photo->move('users/photo', $photo_new_name);

           // $user->photo = 'users/photo/' . $photo_new_name;
      }

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->photo = 'users/photo/' . $photo_new_name;
       // $user->user_type = $request->input('user_type');
        $user->username = $request->input('username');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');
        $user->phone2 = $request->input('phone2');
        $user->blood_group_id = $request->input('blood_group_id');
        $user->state_id = $request->input('state_id');
        $user->lga_id = $request->input('lga_id');
        $user->nationality_id = $request->input('nationality_id');
        $user->address = $request->input('address');
        
        $user->save();

        return redirect(route('profiles.index'))->with('success', 'User Created Successfully !');

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8|max:12',
            'new_password' => 'required|min:8|max:12',
            'confirm_password' => 'required|same:new_password'
        ]);

        $current_user = auth()->user();

        if(Hash::check($request->old_password, $current_user->password)){
            $current_user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->back()->with('success', 'Password updated successfully !');

        }else{
            return redirect(route('profiles.index'))->with('error', 'old password does not matches !');
        }
    }
}
