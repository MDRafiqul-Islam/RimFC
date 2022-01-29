<?php

namespace App\Http\Controllers\user;

use App\Models\News;
use App\Models\State;
use App\Models\Player;
use App\Models\Pachievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserHomeController extends Controller
{
    public function home()
    {
        return view('user.welcome');
    }

    public function showPlayer()
    {
        $players= Player::all();
        return view('user.pages.playerlist',compact('players'));
    }

    public function shownews()
    {
        $news= News::all();
        return view('user.pages.news',compact('news'));
    }

    public function shownewsdetailes($news_id)
    {
        $news= News::find($news_id);
        return view('user.pages.newsDetails',compact('news'));
    }
    public function playerdetailes($player_id)
    {
        $player = Player::find($player_id);
        $achievement = Pachievement::where('player_id', $player_id);
        if(State::where('player_id', $player_id)->exists())
        {
         $state= State::where('player_id', $player_id);
         return view('user.pages.playerdetailes', compact('player', 'achievement', 'state'));
        }
        return view('user.pages.playerdetailes', compact('player', 'achievement'));

    }


}
