<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('roles', 'USER')->get();
        return view('pages.admin.jemaat.index', compact('users'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $jemaat)
    {
        return view('pages.admin.jemaat.edit', compact('jemaat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */


    protected function validation($data){

        if(User::where('email', $data->email)->first()){
            $email_rule = 'required|string|email|max:255';
        }else{
            $email_rule = 'required|string|email|max:255|unique:users';
        }
        return $data->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => $email_rule,
                'place_born' => ['required'],
                'date_born' => ['required', 'date'],
                'gender' => ['required'],
                'region' => ['required'],
                'phone_number' => ['required'],
                'address' => ['required', 'max:255','string'],
            ]);
    } 

    public function update(Request $request, User $jemaat)
    {
        $validation = $this->validation($request);
        $jemaat->update($validation);

        return redirect()->route('jemaat.index')->with('success', 'editConfirm();');
    }
    
    public function reset(Request $request, $id)
    {
        $password = "12345678";
        $user = User::where('id', $id);
        $user->update(['password'=>Hash::make($password)]);
        $flashSession = "deleteConfirm();"; 
        return redirect()->route('jemaat.index')->with('success', $flashSession);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $jemaat)
    {
        $jemaat->delete();
        $flashSession = "deleteConfirm();"; 
        return redirect()->route('jemaat.index')->with('success', $flashSession);
    }
}
