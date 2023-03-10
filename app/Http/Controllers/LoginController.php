<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        // $this->$request->validate([
        //     'email'=>'required|email:dns',
        //     'password'=>'required',
        // ]);

        $this->validate($request, [
            'email'   => 'required|email:dns',
            'password' => 'required|min:5'
        ]);

        // if(Auth::attempt($credentials))
        // {
        //     $request->session()->regenerate();

        //     return redirect()->intended('/mainpage/songs');
        // }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'choose_user_id' => 1])) {
            
            $request->session()->regenerate();

            return redirect()->intended('/lagu');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'choose_user_id' => 2])) {
            
            $request->session()->regenerate();

            return redirect()->intended('/lagu');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'choose_user_id' => 3])) {
            
            $request->session()->regenerate();

            return redirect()->intended('/penilai-lagu');
        }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'choose_user_id' => 4])) {
            
            $request->session()->regenerate();

            return redirect()->intended('/pelulus-lagu');
        }

        return back()->with('loginError','Log masuk gagal! Sila pastikan email address dan password anda betul');
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    
    }
}
