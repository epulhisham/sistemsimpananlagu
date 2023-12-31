<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Choose_user;
use App\Models\Penilai;
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
        ];

        if($request->username != auth()->user()->username){

            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        if($request->email != auth()->user()->email){

            $rules['email'] = 'required|email|unique:users';
        }
        
        if($request->phone_number != auth()->user()->phone_number){

            $rules['phone_number'] = 'required|unique:users|regex:/^[0-9]{10,11}$/';
        }

        $validatedData = $request->validate($rules);

        User::where('id', auth()->user()->id)->update($validatedData);

        $penilai = Penilai::where('user_id', $user->id)->first();
        if ($penilai) {
            $penilai->pilih_penilai = $validatedData['name'];
            $penilai->save();
        }

        if($user->choose_user_id == 1){
            return redirect('/lagu')->with('success', 'Profile telah dikemaskini!');
        } 
        if($user->choose_user_id == 2){
            return redirect('/lagu')->with('success', 'Profile telah dikemaskini!');
        } 
        if($user->choose_user_id == 3){
            return redirect('/penilai-lagu')->with('success', 'Profile telah dikemaskini!');
        } 
        if($user->choose_user_id == 4){
            return redirect('/pelulus-lagu')->with('success', 'Profile telah dikemaskini!');
        } 
        
    }

    public function updatePassword(Request $request, User $user)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:5|max:255|confirmed',
            ]);
    
    
            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Password Lama tidak sama!");
            }
    
    
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            if($user->choose_user_id == 1){
                return redirect('/lagu')->with('success', 'Password telah ditukar!');
            }
            if($user->choose_user_id == 2){
                return redirect('/lagu')->with('success', 'Password telah ditukar!');
            }
            if($user->choose_user_id == 3){
                return redirect('/penilai-lagu')->with('success', 'Password telah ditukar!');
            }
            if($user->choose_user_id == 4){
                return redirect('/pelulus-lagu')->with('success', 'Password telah ditukar!');
            }
            if($user->choose_user_id == 5){
                return redirect('/admin')->with('success', 'Password telah ditukar!');
            }
    
            
    }
    
}
