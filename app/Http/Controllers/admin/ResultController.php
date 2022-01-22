<?php

namespace App\Http\Controllers\admin;

use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;

class ResultController extends Controller
{
    public function showResult()
    {
        $result= Result::all();
        return view('admin.pages.result', compact('result'));
    }
    public function createResult($fixture_id)
    {
        $data = Fixture::find($fixture_id);
        return view('admin.pages.cretaeresult', compact('data'));
    }

    public function addResult(Request $request)
    {
        Result::create([
            'photo'=>$request->photo,
            'date'=>$request->date,
            'myteam'=>$request->myteam,
            'mygoal'=>$request->mygoal,
            'opponent'=>$request->opponent,
            'opponentgoal'=>$request->opponentgoal,
            'fixture_id'=>$request->fixture_id,
            'status'=>$request->status,
        ]);
        $data= Fixture::find($request->fixture_id);
        $data->update([
            'resultstatus'=>'1'
        ]);
        return redirect()->route('admin.pages.result')->with('success','Result Added.');
    }
}
