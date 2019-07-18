<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Redirect;
use Auth;

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

    public function makelogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $status = '1';
       // dd($email);
        $auth = Auth::attempt(
            [
                'email'  => $email,
                'password'  => $password,
                'type'  => '1',					
                'status'  => '1',   
                'deleted'  => '0'   
            ]
        );
       // dd(Auth::check());
        if ($auth) {
            return Redirect::to('checkout');
        }
        else
        {
            return Redirect::to('login');  
        }	

        
        
    }
}
