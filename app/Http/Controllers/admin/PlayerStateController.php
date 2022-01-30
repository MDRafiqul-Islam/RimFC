<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PlayerStateController extends Controller
{
    public function showState()
    {
        $state = State::all();
        return view('admin.pages.playerstatelist',compact('state'));
    }

    public function createState()
    {
        $players = Formation::with('player')->get();
        return view('admin.pages.createplayerstate', compact('players'));
    }

    public function createPlayerState(Request $request)
    {
        $name = $request->name;
        $position = $request->position;
        $min = $request->min;
        $tracle= $request->tracle;
        $clear = $request->clear;
        $goal = $request->goal;
        $assist= $request->assist;
        $cleansheet = $request->cleansheet;
        $save = $request->save;

        for($i=0;$i<count($name);$i++){
        if(! State::where('player_id', $name[$i])->exists())
        {
            State::create([
                        'player_id' =>$name[$i],
                        'position' =>$position[$i],
                        'min' =>$min[$i],
                        'tracle' =>$tracle[$i],
                        'clear' =>$clear[$i],
                        'goal' => $goal[$i],
                        'assist' =>$assist[$i],
                        'cleansheet' =>$cleansheet[$i],
                        'save' => $save[$i],
                    ]);
        }

        else {
            $min1[$i]= State::where('player_id', '=', $name[$i])->select('min')->value('min');
            $tracle1[$i]= State::where('player_id', '=', $name[$i])->select('tracle')->value('tracle');
            $clear1[$i]= State::where('player_id', '=', $name[$i])->select('clear')->value('clear');
            $goal1[$i]= State::where('player_id', '=', $name[$i])->select('goal')->value('goal');
            $assist1[$i]= State::where('player_id', '=', $name[$i])->select('assist')->value('assist');
            $cleansheet1[$i]= State::where('player_id', '=', $name[$i])->select('cleansheet')->value('cleansheet');
            $save1[$i]= State::where('player_id', '=', $name[$i])->select('save')->value('save');
            State::where('player_id', '=', $name[$i])->update([
                'min' =>$min[$i]+$min1[$i],
                'tracle' =>$tracle[$i]+$tracle1[$i],
                'clear' =>$clear[$i]+$clear1[$i],
                'goal' => $goal[$i]+$goal1[$i],
                'assist' =>$assist[$i]+$assist1[$i],
                'cleansheet' =>$cleansheet[$i]+$cleansheet1[$i],
                'save' => $save[$i]+$save1[$i],
            ]);
        }

        }

        Formation::whereNotNull('id')->delete();
        return redirect()->route('admin.pages.playerstatelist')->with('success','Player Created Successfully.');
    }
}
