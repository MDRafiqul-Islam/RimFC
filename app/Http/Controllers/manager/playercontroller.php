<?php

namespace App\Http\Controllers\manager;

use App\Models\Player;
use App\Models\Result;
use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class playercontroller extends Controller
{
    public function showPlayer()
    {
        $players=Player::all();
        return view('manager.pages.playerslist',compact('players'));
    }

    public function showResult()
    {
        $results= Result::all();
        return view('manager.pages.result', compact('results'));
    }

}
