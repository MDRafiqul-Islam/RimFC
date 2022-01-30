<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Massage;
use App\Notifications\MessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function massage()
    {
        $userlist = User::where('role','!=','admin')->get();
        return view('admin.pages.massage',compact('userlist'));
    }

    public function massagelist($user_id)
    {
        $message = Massage::where('sender_id',Auth::user()->id)
        ->where('receiver_id',$user_id)
        ->orwhere('sender_id',$user_id)
        ->where('receiver_id',Auth::user()->id)
        ->get();
        Auth::user()->notifications->markAsRead();
        return view('admin.pages.masagelist', compact('message','user_id'));
    }

    public function createmassage(Request $request, $user_id)
    {
        Massage::create([
            'massage'=>$request->massage,
            'sender_id'=>Auth::user()->id,
            'receiver_id'=>$user_id,
        ]);
        User::find($user_id)->notify(new MessageNotification);
        return redirect()->back();
    }

    public function managermassage()
    {
        $userlist = User::where('role','admin')->get();
        return view('manager.pages.massage',compact('userlist'));
    }

    public function managermassagelist($user_id)
    {
        $message = Massage::where('sender_id',Auth::user()->id)
        ->where('receiver_id',$user_id)
        ->orwhere('sender_id',$user_id)
        ->where('receiver_id',Auth::user()->id)
        ->get();
        Auth::user()->notifications->markAsRead();
        return view('manager.pages.massagelist', compact('message','user_id'));
    }

    public function managercreatemassage(Request $request, $user_id)
    {
        Massage::create([
            'massage'=>$request->massage,
            'sender_id'=>Auth::user()->id,
            'receiver_id'=>$user_id,
        ]);
        User::find($user_id)->notify(new MessageNotification);
        return redirect()->back();
    }

    public function usermassage()
    {
        $userlist = User::where('role','admin')->get();
        return view('user.pages.massage',compact('userlist'));
    }

    public function usermassagelist($user_id)
    {
        $message = Massage::where('sender_id',Auth::user()->id)
        ->where('receiver_id',$user_id)
        ->orwhere('sender_id',$user_id)
        ->where('receiver_id',Auth::user()->id)
        ->get();
        Auth::user()->notifications->markAsRead();
        return view('user.pages.massagelist', compact('message','user_id'));
    }

    public function usercreatemassage(Request $request, $user_id)
    {
        Massage::create([
            'massage'=>$request->massage,
            'sender_id'=>Auth::user()->id,
            'receiver_id'=>$user_id,
        ]);
        User::find($user_id)->notify(new MessageNotification);
        return redirect()->back();
    }
}
