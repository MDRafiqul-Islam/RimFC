<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchased;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dologin()
    {
        return view('user.login');
    }

    public function doregistration()
    {
        return view('user.registration');
    }
    public function registration(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'mobile'=>$request->mobile,
            'photo'=>$request->photo
        ]);

        return redirect()->route('user.dologin')->with('success','Registration successful.');


    }

    public function login(Request $request)
    {

        $userInfo=$request->except('_token');
        if(Auth::attempt($userInfo)){

            if (Auth::user()->status=='block') {
                auth()->logout(Auth::user());
                return redirect()->back()->with('message', 'Sorry, You are blocked 😭');
            }

            if(Auth::user()->role == 'admin')
            {
                return redirect('admin/')->with('message','Login successful.');
            }
            else if(Auth::user()->role == 'manager')
            {
                return redirect('manager/')->with('message','Login successful.');
            }
            else
            {
                return redirect('/')->with('message','Login successful.');
            }

        }
        return redirect()->back()->with('error','Invalid user credentials');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.dologin')->with('message','Logging out.');
    }


    public function block($id, Request $req)
    {
        $user = User::where('id',$id);
        $user->update(['status'=>request('status')]);
        return redirect()->back();
    }
    public function userprofile($id)
    {
         $user= User::find($id);
         $ticket = Purchased:: all();
         return view('user.pages.profile',compact('user','ticket'));
    }
    public function adminprofile($id)
    {
         $user= User::find($id);
         return view('admin.pages.profile',compact('user'));
    }
    public function managerprofile($id)
    {
         $user= User::find($id);
         return view('manager.pages.profile',compact('user'));
    }
}
