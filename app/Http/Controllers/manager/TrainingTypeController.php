<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\PlayerTraining;
use Illuminate\Http\Request;

class TrainingTypeController extends Controller
{
    public function trainingtypelist()
    {
        return view('manager.pages.trainingtype');
    }
    public function trainingstatus()
    {
        $data=PlayerTraining::all();
        return view('manager.pages.training',compact('data'));
    }
    public function admintrainingstatus()
    {
        $data=PlayerTraining::all();
        return view('admin.pages.playertraining',compact('data'));
    }
    public function editstat($id)
    {
        $data = PlayerTraining::find($id);
        return view('admin.pages.edittrainingstate', compact('data'));
    }
    public function editstateList(Request $request, $id)
    {
        $data = PlayerTraining::find($id);
        $data->dribbling= $request->input('dribbling');
        $data->shooting=$request->input('shooting');
        $data->crossing=$request->input('crossing');
        $data->turning=$request->input('turning');
        $data->tackling=$request->input('tackling');
        $data->heading=$request->input('heading');
        $data->passing=$request->input('passing');
        $data->update();
        return redirect()->route('admin.pages.trainingstatus')->with('success','Training State Edited.');
    }
    public function editstatmanager($id)
    {
        $data = PlayerTraining::find($id);
        return view('manager.pages.edittrainingstate', compact('data'));
    }
    public function editstateListmanager(Request $request, $id)
    {
        $data = PlayerTraining::find($id);
        $data->dribbling= $request->input('dribbling');
        $data->shooting=$request->input('shooting');
        $data->crossing=$request->input('crossing');
        $data->turning=$request->input('turning');
        $data->tackling=$request->input('tackling');
        $data->heading=$request->input('heading');
        $data->passing=$request->input('passing');
        $data->update();
        return redirect()->route('manager.pages.trainingstatus')->with('success','Training State Edited.');
    }


}
