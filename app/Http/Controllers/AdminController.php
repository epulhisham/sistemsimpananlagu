<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penilai;
use App\Models\Choose_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('choose_user_id', '!=', 5)->latest();

        if(request('search')){
            $users->where(function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhereHas('choose_user', function($pilih_pengguna){
                    $pilih_pengguna->where('pilih_pengguna', 'like', '%' . request('search') . '%');
                });;
            });
        }
        

        return view ('admin.index',[

            "users"=>$users->paginate(10)
            
        ]);
    }

    public function changeUserPassword($id){

        $user = User::findOrFail($id);

        return view('admin.changeUserPassword',[

            "user" => $user,
        ]);
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
        $user = User::findOrFail($id);

        return view('admin.show',[

            "user" => $user,
            "choose_users"=>Choose_user::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit',[

            "user" => $user,
            "choose_users"=>Choose_user::all()
        ]);
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
        $user = User::findOrFail($id);
    
        $rules = [
            'name'=>'required|max:255',
            'isApproved' => '',
            'choose_user_id'=>'required|not_in:0'
        ];
    
        if($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }
    
        if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users';
    }

    if($request->phone_number != $user->phone_number){

        $rules['phone_number'] = 'required|unique:users|regex:/^[0-9]{10,11}$/';
    }
    
        $validatedData = $request->validate($rules);
    
        $user->isApproved = $request->has('isApproved');

        User::where('id', $user->id)->update($validatedData);
    
        $penilai = Penilai::where('user_id', $user->id)->first();
        if ($penilai) {
            $penilai->pilih_penilai = $validatedData['name'];
            $penilai->save();
        }
    
        return redirect('/admin')->with('success', 'Pengguna telah dikemaskini!');
    }
    
    public function updateUserPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        # Validation
        $request->validate([
            'password' => 'required|min:5|max:255',
        ]);

        #Update the new Password
        User::whereId($user->id)->update([
            'password' => Hash::make($request->password)
        ]);

            return redirect('/admin')->with('success', 'Password Pengguna telah ditukar!');        
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        User::destroy($user->id);
        return redirect('/admin')->withErrors($user)->withInput()->with('success', 'Pengguna telah dipadam!');
    }
}
