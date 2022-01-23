<?php

namespace App\Http\Controllers\admin;

use App\Models\Player;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gellary;

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
    public function showGallery()
    {
        $data = Gellary::all();
        return view('admin.pages.gallery', compact('data'));
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
}
