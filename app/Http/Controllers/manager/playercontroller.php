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
        $player=Player::all();
        return view('manager.pages.playerslist',compact('player'));
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
