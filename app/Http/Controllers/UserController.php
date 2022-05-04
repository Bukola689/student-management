<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blood_group;
use App\Models\State;
use App\Models\Lga;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloodgroups = Blood_group::all();

        $states = State::all();

        $lgas = Lga::all();

        $nationalities = Nationality::all();

        return view('users.create')->with('bloodgroups', $bloodgroups)
                                    ->with('states', $states)
                                    ->with('lgas', $lgas)
                                    ->with('nationalities', $nationalities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validated();
       // dd($request->all());
      /*  $request->validate([
            'photo' => 'required',
            'name' => 'required',
            'user_type' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);*/

        $photo = $request->photo;

        $originalName = $photo->getClientOriginalName();

        $photo_new_name = 'photo-' .time() .  '-' .$originalName;

        $photo->move('users/photo', $photo_new_name);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->code = $request->input('code');
        $user->user_type = $request->input('user_type');
        $user->username = $request->input('username');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->photo = 'users/photo/' . $photo_new_name;
        $user->phone = $request->input('phone');
        $user->phone2 = $request->input('phone2');
        $user->blood_group_id = $request->input('blood_group_id');
        $user->state_id = $request->input('state_id');
        $user->lga_id = $request->input('lga_id');
        $user->nationality_id = $request->input('nationality_id');
        $user->address = $request->input('address');
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect(route('users.index'))->with('success', 'User Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        //dd($user);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $response = Gate::inspect('update', $user);      

        // dd($response);
         if ($response->allowed()) {

        $bloodgroups = Blood_group::all();

        $states = State::all();

        $lgas = Lga::all();

        $nationalities = Nationality::all();

        return view('users.edit')->with('user', $user)
                                 ->with('bloodgroups', $bloodgroups)
                                 ->with('states', $states)
                                 ->with('lgas', $lgas)
                                 ->with('nationalities', $nationalities);

        } else {
            echo $response->message();
         } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $request->validated();
       /* $request->validate([
            'name' => 'required',
            'email' => 'required',
            'code' => 'required',
            'user_type' => 'required',
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

       $user = User::find($id);

        if( $request->hasFile('photo')) {

            $photo = $request->photo;

            $originalName = $photo->getClientOriginalName();
    
            $photo_new_name = 'photo-' .time() .  '-' .$originalName;
    
            $photo->move('users/photo', $photo_new_name);

            $user->photo = 'users/photo/' . $photo_new_name;
      }

        $response = Gate::inspect('update', $user);      

       // dd($response);
        if ($response->allowed()) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->code = $request->input('code');
            $user->user_type = $request->input('user_type');
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
             
             return redirect(route('users.index'))->with('success', 'User Updated Successfully !');

       } else {
            echo $response->message();
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $response = Gate::inspect('delete', $user);
 
        //dd($response);

        if ($response->allowed()) {

       $user = $user->delete();

      // dd($user);

      return redirect(route('users.index'))->with('success', 'User Deleted Successfully !');

        } else {
            echo $response->message();
        }

    }

    public function super_Admin(Request $request, $id)
    {
        $user = User::find($id);

        //dd($user);
        $response = Gate::inspect('super_admin', User::class);
 
      //  dd($response);
        if ($response->allowed()) {
            // The action is authorized...

           $user = $user->update($request->only('user_type'));
           // $user->user_type = $request->input('user_type');
           // $user->save();
            //dd($user);

         return redirect(route('users.index'))->with('success', 'User type Updated Successfully !');
          
        } else {
            echo $response->message();
        } 

    }

    public function search(Request $request)
    {
        //dd($request->all());
        if(isset($_POST['query']))
        {
            $search = $_POST['query'];

            $users = User::where('name', 'LIKE', '%' .$search. '%')->get();
            
            //dd($users);
            return view('users.search')->with('users', $users);
        }
    }

}
