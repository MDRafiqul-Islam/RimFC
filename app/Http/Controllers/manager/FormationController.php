<?php

namespace App\Http\Controllers\manager;

use App\Models\Player;
use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Formation;

class FormationController extends Controller
{
    public function formation($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        return view('manager.pages.formation',compact('fixture'));
    }

    public function formation1($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.3-4-2-1',compact('fixture','players'));
    }
    public function formation2($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.3-4-3',compact('fixture','players'));
    }

    public function formation3($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.4-1-2-1-2',compact('fixture','players'));
    }

    public function formation4($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.4-2-1-3',compact('fixture','players'));
    }

    public function formation5($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.4-3-1-2',compact('fixture','players'));
    }

    public function formation6($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.4-3-3-d',compact('fixture','players'));
    }

    public function formation7($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        $players=Player::all();
        return view('manager.pages.formations.4-4-2',compact('fixture','players'));
    }


    public function createFormation(Request $request)
    {
        $fixture_id = $request->fixture_id;
        $date = $request->date;
        $formation = $request->formation;
        $name = $request->name;
        $position = $request->position;
        $status = $request->status;

        for($i=0;$i<count($name);$i++){
            Formation::create([
                'fixture_id' =>$fixture_id[$i],
                'date' =>$date[$i],
                'formation' =>$formation[$i],
                'name' =>$name[$i],
                'position' =>$position[$i],
                'status' => $status[$i]
            ]);
        }
        return redirect()->back()->with('success','Player Created Successfully.');
    }

    public function showPosition()
    {
        $position = Formation::all();
        return view('manager.pages.position', compact('position'));
    }
}
