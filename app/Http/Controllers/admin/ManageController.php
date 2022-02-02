<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\manager\playercontroller;
use App\Models\Fixture;
use App\Models\Formation;
use App\Models\Player;
use App\Models\Purchased;
use App\Models\Sponsor;
use App\Models\Ticket;

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

    public function dashboard()
    {
        $player = Player::all()->count();
        $ticket = Ticket::all();
        $sponsor = Sponsor::all();
        $pla = Player::all();
        $ticket_income = 0;
        $sponsor_income = 0;
        $player_Sellary = 0;
        foreach($ticket as $tic)
        {
            $ticket_income+= $tic->totalprice;
        }
        foreach($sponsor as $spon)
        {
            $sponsor_income+= $spon->ammount;
        }
        foreach($pla as $pl)
        {
            $player_Sellary+= $pl->salary;
        }
        $total_income =  $ticket_income + $sponsor_income;
        $player_Sellary = $player_Sellary;
        $remaining_salary = $total_income - $player_Sellary;
        $count = 0;
        $block = 0;
        $user = User::all();
        foreach($user as $use)
        {
            $count = $use->count();
            if($use->status == 'block'){
            $block++;
        }
        }
        return view('admin.pages.home',compact('player','total_income','player_Sellary','remaining_salary','count', 'block'));
    }
}
