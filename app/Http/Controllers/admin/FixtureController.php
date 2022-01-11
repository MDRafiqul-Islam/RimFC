<?php

namespace App\Http\Controllers\admin;

use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FixtureController extends Controller
{
    public function showFixture()
    {
        $fixture=Fixture::all();
        return view('admin.pages.fixture',compact('fixture'));
    }

    public function createFixture()
    {
        return view('admin.pages.createfixture');
    }

    public function addFixture(Request $request)
    {
        $image_name=null;
        if($request->hasFile('photo'))
        {
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/fixture',$image_name);
        }

        Fixture::create([
            'photo'=> $image_name,
            'date'=>$request->date,
            'time'=>$request->time,
            'opponent'=>$request->opponent,
            'venu'=>$request->venu,
        ]);
        return redirect()->back()->with('success','Fixture Created Successfully.');

    }
}
