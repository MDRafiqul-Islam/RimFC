<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\Player;
use Illuminate\Http\Request;

class playercontroller extends Controller
{
    public function showPlayer()
    {
        $players=Player::all();
        return view('manager.pages.playerslist',compact('players'));
    }

}
