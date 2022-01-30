<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function achievement()
    {
         $achi = Achievement::all();
        return view('admin.pages.achievement', compact('achi'));
    }

    public function create()
    {
        return view('admin.pages.createachievemnt');
    }

    public function addachievement(Request $request)
    {

        Achievement::create([
            'champions'=>$request->champions,
            'europa'=>$request->europa,
            'conference'=>$request->conference,
            'premier'=>$request->premier,
            'english'=>$request->english,
        ]);
        return redirect()->route('admin.pages.achievement')->with('success','Achievement Created Successfully.');
    }

    public function deleteachievemnt($id)
    {
        $achi= Achievement::find($id)->delete();
        return redirect()->route('admin.pages.achievement')->with('success','Achievement Delete Successfully.');
    }

    public function achivementEdit($id)
    {
        $data = Achievement::find($id);
        return view('admin.pages.editachievement', compact('data'));
    }

    public function editachivement(Request $request, $id)
    {
        $data = Achievement::find($id);
        $data->update([
            'champions'=>$request->champions,
            'europa'=>$request->europa,
            'conference'=>$request->conference,
            'premier'=>$request->premier,
            'english'=>$request->english,
        ]);
        return redirect()->route('admin.pages.achievement')->with('success','Achievement Edited Successfully.');
    }
}
