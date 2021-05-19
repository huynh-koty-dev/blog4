<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login(Request $req){
        if(empty($req->email)){
            $errors = 'Email field must be not empty!';
            return view('components.login',['errorEmail'=>$errors]);
        }
        if(empty($req->password)){
            $errors = 'Email field must be not empty!';
            return view('components.login',['errorPass'=>$errors]);
        }
        $user = User::where(['email'=> $req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            $errors = 'Email or Password not matched!';
            
            return view('components.login',['error'=>$errors]);
        }else{
            $req->session()->put('user',$user->username);
            $req->session()->put('id',$user->id);
            return redirect('/');
        }
    }
    public function logout(Request $req)
    {
        $req->session()->pull('user');
        $req->session()->pull('id');
        return redirect('/');
    }

    public function register(Request $req)
    {
        $req->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required|max:30',
            'repassword'=>'required'
        ],
        [
            'username.required' => 'Username field must be not empty!',
            'email.required' => 'Email field must be not empty!',
            'password.required' => 'Password field must be not empty!',
            'repassword.required' => 'Password field must be not empty!',
            // 'password.min'=>'Password must be at least 8 characters',
            'password.max'=>'Password must not exceed 30 characters',
        ]);
        if($req->password !== $req->repassword){
            $errors = 'Password not matched!';
            return view('components.register',['error'=>$errors]);
        }
        $user = User::where(['email'=> $req->email])->first();
        if($user){
            $errors = 'Email already exist!';
            return view('components.register',['error'=>$errors]);
        }
        else{
            $data = new User;
            $data->email = $req->email;
            $data->username = $req->username;
            $data->password = Hash::make($req->password);
            $data->save();
            return redirect('/login');
        }
        
    }   
}
