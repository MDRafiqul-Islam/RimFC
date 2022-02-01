<?php

namespace App\Http\Controllers\user;

use App\Models\News;
use App\Models\Venu;
use App\Models\State;
use App\Models\Player;
use App\Models\Result;
use App\Models\Fixture;
use App\Models\Sponsor;
use App\Models\VenuGallery;
use App\Models\Pachievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchased;

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
        $achievement = Pachievement::where('player_id', $player_id)->first();
        if(State::where('player_id', $player_id)->exists())
        {
         $state= State::where('player_id', $player_id)->first();
         return view('user.pages.playerdetailes', compact('player', 'achievement', 'state'));
        }
        return view('user.pages.playerdetailes', compact('player', 'achievement'));

    }

    public function showfixture()
    {
        $fixture=Fixture::all();
        $results = Result::all();
        return view('user.pages.fixture',compact('fixture','results'));
    }

    public function showResult()
    {
        $results= Result::all();
        return view('user.pages.result', compact('results'));
    }

    public function showvenu()
    {
        $data=Venu::all();
        $data1= VenuGallery::all();
        return view('user.pages.stadium',compact('data','data1'));
    }

    public function showsponsor()
    {
        $data= Sponsor::all();
        return view('user.pages.sponsor',compact('data'));
    }

    public function ticketPrint($id)
    {
        $tic = Purchased::find($id);
        return view('user.ticketprint', compact('tic'));
    }


}
