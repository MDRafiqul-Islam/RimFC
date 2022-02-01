<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\Formation;
use App\Models\Purchased;

class ManageController extends Controller
{
    public function showUser()
    {
        $user=  User::where('role','!=','admin')->get();
        return view('admin.pages.manageuser', compact('user'));
    }

    public function ticketshow()
    {
       $ticket = Purchased::all();
       $fixture = array();
       foreach($ticket as $data)
       {
           if(Fixture::find($data->fixture_id)->resultstatus == '0'){
               array_push($fixture , $data);
           }
       }
       return view('admin.pages.ticketshow',compact('fixture'));
    }

    public function matchplayer()
    {
        $matchplayer=Formation::all();
        return view('admin.pages.mathplayer', compact('matchplayer'));
    }
}
