<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        // ke halaman harus login
        $this->middleware('auth');
    }

    public function index(){

        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request){

        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->nohp;
        $user->alamat = $request->alamat;

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect('profile')->withToastSuccess('Profile telah diperbarui!');

    }
}
