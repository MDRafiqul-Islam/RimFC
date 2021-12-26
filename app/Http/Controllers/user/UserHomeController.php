<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Player;
use Illuminate\Http\Request;

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

    public function shownewsdetailes()
    {
        $news= News::all();
        return view('user.pages.newsDetails',compact('news'));
    }
}
