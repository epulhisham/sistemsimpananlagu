<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Choose_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changepassword(){

        return view('user.changepassword');
    }

    public function edit(User $user)
    {
        $user = User::find(auth()->user()->id);

        return view('user.edit',[

            "user" => $user,
            "choose_users"=>Choose_user::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name'=>'required|max:255',
            'choose_user_id'=>'required|not_in:0'
        ];

        if($request->username != auth()->user()->username){

            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        if($request->email != auth()->user()->email){

            $rules['email'] = 'required|email|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect('/mainpage/songs')->with('success', 'Profile telah dikemaskini!');
    }

    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);
    
    
            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Password Lama tidak sama!");
            }
    
    
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
    
            return redirect('/mainpage/songs')->with('success', 'Password telah ditukar!');
    }
    
}
