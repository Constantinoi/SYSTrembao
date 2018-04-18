<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  

    use AuthenticatesUsers;

  
    protected function authenticated($request, $user)
    {
        // if($user->eAdmin()) {
        //     return redirect()->intended('/admin');
        // }

        return redirect()->intended('/home');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
