<?php

namespace App\Http\Controllers\manager;

use App\Models\Player;
use App\Models\Result;
use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class playercontroller extends Controller
{
    public function showPlayer()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $player = Player::where('name','LIKE','%'.$key.'%')
                ->orWhere('jersy_no','LIKE','%'.$key.'%')
                ->get();
            return view('manager.pages.playerslist',compact('player','key'));
        }
        $player=Player::all();
        return view('manager.pages.playerslist',compact('player','key'));
    }

    public function showResult()
    {
        $results= Result::all();
        return view('manager.pages.result', compact('results'));
    }

    public function dashboard()
    {
        $player = Player::all()->count();
        $pla = Player::all();
        $available = 0;
        foreach($pla as $play)
        {
            if($play->available == 'yes'){
                $available++;
            }
        }
        $fixture = Fixture::all();
        $fixavail = 0;
        foreach($fixture as $fix){
          if($fix->resultstatus == '0'){
            $fixavail++;
          }
        }
        return view('manager.pages.home', compact('player','available','fixavail'));

    }

    public function playerstate()
    {
        $state = State::all();
        return view('manager.pages.playerstate', compact('state'));
    }

}
