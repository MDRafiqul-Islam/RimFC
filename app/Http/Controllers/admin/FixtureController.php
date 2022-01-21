<?php

namespace App\Http\Controllers\admin;

use App\Models\Result;
use App\Models\Ticket;
use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FixtureController extends Controller
{
    public function showFixture()
    {
        $fixture=Fixture::all();
        $result=Result::all();
        $ticket=Ticket::all();
        return view('admin.pages.fixture',compact('fixture','result','ticket'));
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
    public function fixturedelete($fixture_id)
    {
        Fixture::find($fixture_id)->delete();
        return redirect()->back()->with('success','Fixture Deleted.');
    }

    public function fixtureEdit($fixture_id)
    {
        $data = Fixture::find($fixture_id);
        return view('admin.pages.editfixture', compact('data'));

    }


    public function editFixtureList(Request $request, $fixture_id)
    {
        $data = Fixture::find($fixture_id);
        if($request->hasFile('photo'))
        {
            $path='storage/fixture/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/fixture',$image_name);
            $data->photo= $image_name;


        }
        $data->date=$request->input('date');
        $data->time=$request->input('time');
        $data->opponent=$request->input('opponent');
        $data->venu=$request->input('venu');
        $data->update();
        return redirect()->route('admin.pages.fixture')->with('success','Fixture Edited.');
    }

}

