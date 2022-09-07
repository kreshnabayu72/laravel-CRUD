<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show_login(){
        return view('login');
    }

    public function show_register(){
        return view('register');
    }

    public function show_admin(){
        return view('admin',[
            'users'=>User::all(),
            'posts'=>Post::all(),
        ]);
    }

    public function show_edit_user(User $user){
        return view('edit_account',[
            'user'=>$user,
        ]);
    }

    public function post_register(Request $request){
        $formFields = $request->validate([
            'email'=> 'required',
            'username'=>'required',
            'password'=>'required',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);
        return redirect('/login')->with('message','success register');
    }

    public function post_login(Request $request){
        $formFields = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($formFields)){
            $user = User::where('username',$formFields['username'])->first();
            Auth::login($user);
            return redirect('/')->with("message","success login");
        }
        return back()->with("message","error???");
    }

    public function post_logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/')->with("message", "logged out");
    }

    public function edit_user(Request $request,User $user){
        $formFields = $request->validate([
            'email'=> 'required',
            'username'=>'required',
            'password'=>'required',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user->update($formFields);
        return redirect('/admin')->with('message','success edit');
    }

    public function delete_user(User $user){
        $user->delete();
        return redirect('/admin')->with("message","user deleted");
    }  
}
