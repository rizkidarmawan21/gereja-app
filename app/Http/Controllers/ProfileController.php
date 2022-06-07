<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $validation = $this->validation($request);
        User::where('id', Auth::user()->id)->update($validation);
        return redirect()->route('profile')->with('success', 'Profil Berhasil diperbarui!');

    }


    public function updatePassword(Request $request){
        $validation = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);
        if(!(Hash::check($validation['current_password'], Auth::user()->password))){
            return redirect()->back()->with('error', 'Password lama tidak sesuai!');
        }

        $user = Auth::user();
        $user->password = Hash::make($validation['new_password']);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password Berhasil diperbarui!');
    }

}
