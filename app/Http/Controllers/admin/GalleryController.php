<?php

namespace App\Http\Controllers\admin;

use App\Models\Player;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Gellary;
use App\Models\PlayerTraining;
use App\Models\Result;
use App\Models\Training;

class GalleryController extends Controller
{
    public function showGalleryCategory()
    {
        $data=Category::all();
        return view('admin.pages.gallerycategory', compact('data'));
    }

    public function createGalleryCategory()
    {
        return view('admin.pages.creategallerycategory');
    }

    public function createCategory(Request $request)
    {
        Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('admin.pages.showGalleryCategory')->with('success','Category Created Successfully.');
    }
    public function deleteCategory($id){
       Category::find($id)->delete();
       return redirect()->route('admin.pages.showGalleryCategory')->with('success','Category deleted Successfully.');
    }
    public function showGallery()
    {
        return view('admin.pages.galleryshow');
    }
    public function showGalleryplayer()
    {
        $data = Gellary::all();
        return view('admin.pages.galleryplayer', compact('data'));
    }
    public function createGalleryplayer($player_id)
    {
        $player= Player::find($player_id);
        $gallery= Category::all();
        return view('admin.pages.creategalleryplayer',compact('player','gallery'));
    }
    public function addGalleryplayer(Request $request)
    {
       $images=array();
                if($files=$request->file('photo')){
                foreach($files as $file){
                $name=date('Ymdhis').'.'.$file->getClientOriginalName();
                $file->storeAs('/gellary',$name);
                $images[]=$name;
                }
        }
       Gellary::create([
            'player_id'=>$request->player_id,
            'date'=>$request->date,
            'category_id'=>$request->category_id,
            'photo'=>implode("|",$images),
       ]);
       return redirect()->route('admin.pages.showGallery')->with('success','Player Added To Gellary.');
    }

    public function deleteGallery($id){
        Gellary::find($id)->delete();
        return redirect()->route('admin.pages.showGallery')->with('success','Image Deleted Successfully');
    }

    public function showGalleryresult()
    {
        $data = Gellary::all();
        return view('admin.pages.gellaryresult', compact('data'));
    }
    public function createGalleryresult($result_id)
    {
        $result= Result::find($result_id);
        $gallery= Category::all();
        return view('admin.pages.creategalleryresult',compact('result','gallery'));
    }
    public function addGalleryresult(Request $request)
    {
       $images=array();
                if($files=$request->file('photo')){
                foreach($files as $file){
                $name=date('Ymdhis').'.'.$file->getClientOriginalName();
                $file->storeAs('/gellary',$name);
                $images[]=$name;
                }
        }
       Gellary::create([
            'result_id'=>$request->result_id,
            'date'=>$request->date,
            'category_id'=>$request->category_id,
            'photo'=>implode("|",$images),
       ]);
       return redirect()->route('admin.pages.showGallery')->with('success','Gellary Added To Gellary.');
    }



    public function showGalleryachievement()
    {
        $data = Gellary::all();
        return view('admin.pages.gellaryachievement', compact('data'));
    }
    public function createGalleryachievement($achievement_id)
    {
        $result= Achievement::find($achievement_id);
        $gallery= Category::all();
        return view('admin.pages.creategalleryachivement',compact('result','gallery'));
    }
    public function addGalleryachievement(Request $request)
    {
       $images=array();
                if($files=$request->file('photo')){
                foreach($files as $file){
                $name=date('Ymdhis').'.'.$file->getClientOriginalName();
                $file->storeAs('/gellary',$name);
                $images[]=$name;
                }
        }
       Gellary::create([
            'achivement_id'=>$request->achievement_id,
            'date'=>$request->date,
            'category_id'=>$request->category_id,
            'photo'=>implode("|",$images),
       ]);
       return redirect()->route('admin.pages.showGallery')->with('success','Image Added To Gellary.');
    }


    public function showGallerytraining()
    {
        $data = Gellary::all();
        return view('admin.pages.gellarytraining', compact('data'));
    }
    public function createGallerytraining()
    {
        $gallery= Category::all();
        return view('admin.pages.creategallerytraining',compact('gallery'));
    }
    public function addGallerytraining(Request $request)
    {
       $images=array();
                if($files=$request->file('photo')){
                foreach($files as $file){
                $name=date('Ymdhis').'.'.$file->getClientOriginalName();
                $file->storeAs('/gellary',$name);
                $images[]=$name;
                }
        }
       Gellary::create([
            'achivement_id'=>$request->achievement_id,
            'date'=>$request->date,
            'category_id'=>$request->category_id,
            'photo'=>implode("|",$images),
       ]);
       return redirect()->route('admin.pages.showGallery')->with('success','Image Added To Gellary.');
    }
}
