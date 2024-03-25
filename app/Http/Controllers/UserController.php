<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function login(Request $request)
   {
     $incommingFields = $request->validate([
        'loginname' => 'required',
        'loginpassword' =>'required'
     ]);

     if (auth()->attempt(['name'=>$incommingFields['loginname'], 'password'=>$incommingFields['loginpassword']]))
     {$request->session()->regenerate();}
     return redirect('/');
   }



   public function logout()
   {
    auth()->logout();
    return redirect('/');
   }


   public function register(Request $request)
   {

    $incommingFields = $request->validate([
        'name'=>['required', 'min:3' ,'max:10', Rule::unique('users','name')],
        'email'=>['required', 'email', Rule::unique('users','email')],
        'password'=>['required','min:4' , 'max:200']
                                          ]);
    //hashing passowrd
    $incommingFields['password']= bcrypt($incommingFields['password']);
    //put the info in a usere model which already finns
    $user= User::create($incommingFields);
    return redirect('/');


   }
}
