<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */


    protected function validation($data){

        if($data->email === Auth::user()->email){
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

    public function update(Request $request, User $user)
    {

        // dd(Auth::user()->id);
        $validation = $this->validation($request);
        User::where('id', Auth::user()->id)->update($validation);
        // $user->set($validation)->whe;
        // $user->save();
        return redirect()->route('profile')->with('success', 'Profil Berhasil diperbarui!');

    }

}
