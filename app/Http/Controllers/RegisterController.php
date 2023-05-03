<?php

namespace App\Http\Controllers;

use App\Models\Choose_user;
use App\Models\Penilai;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[

            "choose_users"=>Choose_user::all()
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:3|max:255|unique:users',
            'email'=>'required|email|unique:users',
            'phone_number'=>'required|unique:users|regex:/^[0-9]{10,11}$/',
            'password'=>'required|min:5|max:255',
            'choose_user_id'=>'required|not_in:0'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        
        if ($user->choose_user_id == 3) {
            Penilai::create([
                "user_id" => $user->id,
                "pilih_penilai" => $user->name
            ]);
        }
        

        return redirect('/login')->with('success','Pendaftaran akaun berhasil!');
    }
}
