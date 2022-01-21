<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlayerListController extends Controller
{
    public function playerList()
    {
        $Total_salary = 5000;
        $player_salary=0;
        $remain_salary= $Total_salary;
        $players= Player::all();
        foreach ($players as $key => $player) {
            $player_salary+= $player->salary;
            $remain_salary-=$player_salary;
        }
        return view('admin.pages.playerslist',compact('players','Total_salary','player_salary','remain_salary'));
    }


    public function create()
    {

        return view('admin.pages.createplayers');
    }


    public function addplayer(Request $request)
    {
        $Total_salary = 5000;
        $player_salary=0;
        $remain_salary= $Total_salary;
        $players= Player::all();
        foreach ($players as $key => $player) {
            $player_salary+= $player->salary;
            $remain_salary-=$player_salary;
        }
        if($player_salary<= $Total_salary){
        $image_name=null;
        //dd($request->all());
        if($request->hasFile('photo'))
        {
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/players',$image_name);

        }
        Player::create([
            'jersy_no'=>$request->jersyno,
            'name'=>$request->name,
            'position'=>$request->position,
            'age'=>$request->age,
            'foot'=>$request->foot,
            'salary'=>$request->salary,
            'available'=>$request->available,
            'photo'=> $image_name,
        ]);
        return redirect()->route('admin.pages.playerslist')->with('success','Player Created Successfully.');
        }

        else
        {
            return redirect()->route('admin.pages.playerslist')->with('error','Salary Limit Has Been Executed');
        }
    }


    public function playerDelete($player_id)
    {
       Player::find($player_id)->delete();
       return redirect()->back()->with('success','Player Deleted.');
    }


    public function playerEdit($player_id)
    {
        $data = Player::find($player_id);
        return view('admin.pages.editplayerlist', compact('data'));

    }


    public function editPlayerList(Request $request, $player_id)
    {
        $data = Player::find($player_id);
        if($request->hasFile('photo'))
        {
            $path='storage/players/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/players',$image_name);
            $data->photo= $image_name;

        }
        $data->jersy_no= $request->input('jersyno');
        $data->name=$request->input('name');
        $data->position=$request->input('position');
        $data->age=$request->input('age');
        $data->foot=$request->input('foot');
        $data->salary=$request->input('salary');
        $data->available=$request->input('available');
        $data->update();
        return redirect()->route('admin.pages.playerslist')->with('success','Player Edited.');
    }


    public function serach(Request $request)
    {
        $players= Player::where('position', $request->search)->get();
        return view('admin.pages.playersearch', compact('players'));
    }

}
