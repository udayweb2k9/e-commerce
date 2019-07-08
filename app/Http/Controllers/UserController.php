<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Redirect;

class UserController extends Controller
{
    public function login()
    {        
        return view('login');
    }

    public function registerd(Request $request)
    {
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $email = $request->get('email');
        $password = Hash::make($request->get('password'));
        $status = '1';

        $user = new User();
        $user->fname=$fname;
        $user->lname=$lname;
        $user->email=$email;
        $user->password=$password;
        $user->status=$status;
        $user->save();

        return Redirect::to('checkout');
        
    }
}
