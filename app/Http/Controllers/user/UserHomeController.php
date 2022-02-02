<?php

namespace App\Http\Controllers\user;

use App\Models\News;
use App\Models\Venu;
use App\Models\State;
use App\Models\Player;
use App\Models\Result;
use App\Models\Fixture;
use App\Models\Gellary;
use App\Models\Sponsor;
use App\Models\Purchased;
use App\Models\VenuGallery;
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
        $key=null;
        if(request()->search){
            $key=request()->search;
            $players = Player::where('name','LIKE','%'.$key.'%')
                ->orWhere('jersy_no','LIKE','%'.$key.'%')
                ->get();
            return view('user.pages.playerlist',compact('players','key'));
        }
        $players= Player::all();
        return view('user.pages.playerlist',compact('players','key'));
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
    public function showGallery()
    {
        return view('user.pages.gellary');
    }

    public function showGalleryplayer()
    {
        $data = Gellary::all();
        return view('user.pages.gellaryplayer', compact('data'));
    }

    public function showGalleryresult()
    {
        $data = Gellary::all();
        return view('user.pages.gellaryresult', compact('data'));
    }

    public function showGalleryachievement()
    {
        $data = Gellary::all();
        return view('user.pages.gellaryachievement', compact('data'));
    }

    public function showGallerytraining()
    {
        $data = Gellary::all();
        return view('user.pages.gellarytraining', compact('data'));
    }

    public function dashboard()
    {
        $state= State::all();
        $topscore = 0;
        $assist = 0;
        $min = 0;
        $min1 = 0;
        $topscorer = null;
        $topassist = null;
        foreach($state as $states)
        {
            if($states->goal > $topscore)
            {

                $topscore = $states->goal;
                $topscorer = $states->player_id;
                $min =  $states->min;
            }
            elseif($states->goal == $topscore)
            {
                if($states->min < $min)
                {
                    $topscore = $states->goal;
                    $topscorer = $states->player_id;
                }
            }

        }
        foreach($state as $states)
        {
            if($states->assist > $assist)
            {
                $assist = $states->assist;
                $topassist = $states->player_id;
                $min1 =  $states->min;
            }
            elseif($states->assist == $assist)
            {
                if($states->min < $min1)
                {
                    $assist= $states->assist;
                    $topassist = $states->player_id;
                }
            }
        }

        $Player1 = State::where('player_id', $topscorer)->first();
        $Player2 = State::where('player_id', $topassist)->first();
        $news = News::latest()->paginate(2);
        $result = Result::latest()->paginate(1);
        $fixture = Fixture::whereDate('date', '>', date("Y-m-d"))->get();
        return view('user.pages.home',compact('Player1', 'Player2','news','fixture','result'));
    }

}
