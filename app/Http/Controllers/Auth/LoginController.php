<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    // protected $redirectTo = '/home';

    protected function redirectTo(){
        $user = Auth::user();
        switch ($user) {
            case $user->isAdmin();
            return '/admin/dashboard';
            break;

            case $user->isUser();
                return '/home';
                break;

                default:
                return '/';
                break;
        }
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
