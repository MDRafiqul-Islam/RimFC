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
        return view('admin.pages.playerstatelist');
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
            $players[$i]= State::select('player_id')->value('player_id');
        if($players[$i]!= $name[$i])
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

        else if($players[$i]== $name[$i]){
            $min1= State::select('min')->value('min');
            $tracle1= State::select('tracle')->value('tracle');
            $clear1= State::select('clear')->value('clear');
            $goal1= State::select('goal')->value('goal');
            $assist1= State::select('assist')->value('assist');
            $cleansheet1= State::select('cleansheet')->value('cleansheet');
            $save1= State::select('save')->value('save');
            State::where('player_id', '=', $name[$i])->update([

                'min' =>$tracle[$i]+$min1,
                'tracle' =>$clear[$i]+$tracle1,
                'clear' =>$clear[$i]+$clear1,
                'goal' => $goal[$i]+$goal1,
                'assist' =>$assist[$i]+$assist1,
                'cleansheet' =>$cleansheet[$i]+$cleansheet1,
                'save' => $save[$i]+$save1,
            ]);

        }

        }

        return redirect()->route('admin.pages.playerstatelist')->with('success','Player Created Successfully.');
    }
}
