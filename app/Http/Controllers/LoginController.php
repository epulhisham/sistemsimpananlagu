<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:5'
        ]);
    
        // Attempt to authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();


    
            // Check if user is approved
            if ($user->isApproved == 1) {
                $user->last_login = now();
                $user->save();
                $request->session()->regenerate();
                // Redirect to appropriate URL based on user type
                switch ($user->choose_user_id) {
                    case 1:
                    case 2:
                        return redirect()->intended('/lagu');
                    case 3:
                        return redirect()->intended('/penilai-lagu');
                    case 4:
                        return redirect()->intended('/pelulus-lagu');
                    case 5:
                    default:
                        return redirect()->intended('/admin');
                }
            } else {
                // User not approved
                Auth::logout();
                return back()->with('loginError','Log masuk gagal! Pengguna belum disahkan.');
            }
        }
    
        // Invalid login credentials
        return back()->with('loginError','Log masuk gagal! Sila pastikan email address dan password anda betul');
    }
    

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    
    }
}
