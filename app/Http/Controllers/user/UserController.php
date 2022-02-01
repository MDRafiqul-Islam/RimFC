<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Fixture;
use App\Models\Purchased;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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
        // $request->validate([
        //     'email'=>  ['required', 'unique:posts'],
        //     'password'=> ['required', 'min:6'],
        //     'mobile'=> ['required', 'unique:posts', 'max:20'],
        //     'name'=>'name',
        // ]);
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
         $ticket = Purchased::where('user_id', $user->id)->get();
         $fixture = array();
         foreach($ticket as $data)
       {
           if(Fixture::find($data->fixture_id)->resultstatus == '0'){
               array_push($fixture , $data);
           }
       }
         return view('user.pages.profile',compact('user','fixture'));
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

    public function editprofile($id)
    {
        $data= User::find($id);
        return view('user.pages.editprofile',compact('data'));
    }

    public function profileedit(Request $request, $id)
    {
        $data= User::find($id);
        if($request->hasFile('photo'))
        {
            $path='storage/users/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/users',$image_name);

        }
        $data->update([
            'name'=> $request->name,
            'photo'=> $image_name
        ]);
        return redirect()->route('user.profile', Auth::user())->with('success','Updated Successfully');

    }

    public function admineditprofile($id)
    {
        $data= User::find($id);
        return view('admin.pages.editprofile',compact('data'));
    }

    public function adminprofileedit(Request $request, $id)
    {
        $data= User::find($id);
        if($request->hasFile('photo'))
        {
            $path='storage/users/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/users',$image_name);

        }
        $data->update([
            'name'=> $request->name,
            'photo'=> $image_name
        ]);
        return redirect()->route('user.profile', Auth::user())->with('success','Updated Successfully');

    }
    public function managereditprofile($id)
    {
        $data= User::find($id);
        return view('manager.pages.editprofile',compact('data'));
    }

    public function managerprofileedit(Request $request, $id)
    {
        $data= User::find($id);
        if($request->hasFile('photo'))
        {
            $path='storage/users/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/users',$image_name);
            $data->photo= $image_name;


        }
        $data->name=$request->input('name');
        $data->update();
        return redirect()->route('user.profile', Auth::user())->with('success','Updated Successfully');
    }
}
