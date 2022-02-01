<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\PlayerTraining;
use App\Models\Training;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    //driblling

    public function traindriblling()
    {
        $data = Training::all();
        return view('manager.pages.training.dribbling', compact('data'));
    }

    public function trainingdriblling()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->dribbling <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);
              $training =Training::where('player_id', $train->player_id);
              $training->update([
                  'dribbling' => 1
              ]);
           }
           else{
            return redirect()->back()->with('error','Player Added For Today');
           }
        }
        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showdriblling()
    {
        $data = Training::all();
        return view('manager.pages.training.editdriblling', compact('data'));
    }

    public function editdriblling(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'dribbling' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('dribbling')->value('dribbling')) + 1.0
                ]);
            }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'dribbling' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('dribbling')->value('dribbling')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'dribbling' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('dribbling')->value('dribbling')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.dribbling')->with('success','Status Updated Successfully');
    }

    // crossing

    public function traincrossing()
    {
        $data = Training::all();
        return view('manager.pages.training.crossing', compact('data'));
    }

    public function trainingcrossing()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->crossing <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);

              $training =Training::where('player_id', $train->player_id);
              $training->update([
                'crossing' => 1
            ]);
           }
           else{
            return redirect()->back()->with('error','Player Added For Today');
           }
        }
        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showcrossing()
    {
        $data = Training::all();
        return view('manager.pages.training.editcrossing', compact('data'));
    }

    public function editcrossing(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'crossing' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('crossing')->value('crossing')) + 1.0
                ]);
            }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'crossing' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('crossing')->value('crossing')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'crossing' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('crossing')->value('crossing')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.crossing')->with('success','Status Updated Successfully');
    }

    // heading


    public function trainheading()
    {
        $data = Training::all();
        return view('manager.pages.training.heading', compact('data'));
    }

    public function trainingheading()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->heading <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);
                $training =Training::where('player_id', $train->player_id);
              $training->update([
                'heading' => 1
            ]);

           }
           else{
            return redirect()->back()->with('error','Player Added For Today');
           }
        }
        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showheading()
    {
        $data = Training::all();
        return view('manager.pages.training.editheading', compact('data'));
    }

    public function editheading(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'heading' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('heading')->value('heading')) + 1.0
                ]);
            }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'heading' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('heading')->value('heading')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'heading' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('heading')->value('heading')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.heading')->with('success','Status Updated Successfully');
    }

     //passing

    public function trainpassing()
    {
        $data = Training::all();
        return view('manager.pages.training.passing', compact('data'));
    }

    public function trainingpassing()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->passing <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);
              $training =Training::where('player_id', $train->player_id);
              $training->update([
                'passing' => 1
            ]);
           }
           else{
            return redirect()->back()->with('error','Player Added for Today');
           }
        }
        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showpassing()
    {
        $data = Training::all();
        return view('manager.pages.training.editpassing', compact('data'));
    }

    public function editpassing(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'passing' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('passing')->value('passing')) + 1.0
                ]);
            }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'passing' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('passing')->value('passing')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'passing' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('passing')->value('passing')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.passing')->with('success','Status Updated Successfully');
    }

    //shooting

    public function trainshooting()
    {
        $data = Training::all();
        return view('manager.pages.training.shooting', compact('data'));
    }

    public function trainingshooting()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->shooting <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);
              $training =Training::where('player_id', $train->player_id);
              $training->update([
                'shooting' => 1
            ]);
           }
           else{
            return redirect()->back()->with('error','Player Added For Training');
           }
        }

        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showshooting()
    {
        $data = Training::all();
        return view('manager.pages.training.editshooting', compact('data'));
    }

    public function editshooting(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'shooting' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('shooting')->value('shooting')) + 1.0
                ]);
            }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'shooting' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('shooting')->value('shooting')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'shooting' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('shooting')->value('shooting')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.shooting')->with('success','Status Updated Successfully');
    }

// tracling
    public function traintracling()
    {
        $data = Training::all();
        return view('manager.pages.training.tracling', compact('data'));
    }

    public function trainingtracling()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->tracling <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);
              $training =Training::where('player_id', $train->player_id);
              $training->update([
                'tracling' => 1
            ]);
           }
           else{
            return redirect()->back()->with('error','Player Added For Training');
           }
        }
        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showtracling()
    {
        $data = Training::all();
        return view('manager.pages.training.edittracling', compact('data'));
    }

    public function edittracling(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'tracling' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('tracling')->value('tracling')) + 1.0
                ]);
                }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'tracling' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('tracling')->value('tracling')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'tracling' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('tracling')->value('tracling')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.tracling')->with('success','Status Updated Successfully');
    }

// turning
    public function trainturning()
    {
        $data = Training::all();
        return view('manager.pages.training.turning', compact('data'));
    }

    public function trainingturning()
    {
        $data = PlayerTraining::all();
        foreach ($data as $train)
        {
           if($train->turning <= 90 && !Training::where('player_id', $train->player_id)->exists()){
              Training::create([
                  'date'=> Carbon::now(),
                  'player_id' => $train->player_id,
              ]);
              $training =Training::where('player_id', $train->player_id);
              $training->update([
                'turning' => 1
            ]);
           }
           else{
            return redirect()->back()->with('error','Player Added For Training');
           }
        }
        return redirect()->back()->with('success','Player Added To Training List');
    }

    public function showturning()
    {
        $data = Training::all();
        return view('manager.pages.training.editturning', compact('data'));
    }

    public function editturning(Request $request)
    {
        $player_id = $request->player_id;
        $Status = $request->status;
        for($i=0;$i<count($player_id);$i++){
            Training::where('player_id', '=', $player_id[$i])->update([
                'status'=> $Status[$i]
            ]);
            $data = Training::where('player_id', $player_id[$i])->first();
            if( $data->status == 'good'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'turning' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('turning')->value('turning')) + 1.0
                ]);
            }
            if( $data->status == 'average'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'turning' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('turning')->value('turning')) + 0.5
                ]);
            }
            if( $data->status == 'poor'){
                PlayerTraining::where('player_id', '=', $player_id[$i])->first()->update([
                    'turning' => (PlayerTraining::where('player_id', '=', $player_id[$i])->select('turning')->value('turning')) + 0.1
                ]);
            }
        }
        Training::whereNotNull('id')->delete();
        return redirect()->route('manager.pages.training.turning')->with('success','Status Updated Successfully');
    }

}
