<?php

namespace App\Http\Controllers\admin;

use App\Models\Venu;
use App\Models\VenuGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class VenuController extends Controller
{
    public function showvenu()
    {
        $data=Venu::all();
        $data1= VenuGallery::all();
        return view('admin.pages.stadium',compact('data','data1'));
    }
    public function createvenu()
    {
        $data=Venu::all();
        return view('admin.pages.createvenu',compact('data'));
    }
    public function addVenu(Request $request)
    {
        $image_name=null;
        if($request->hasFile('photo'))
        {
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/venu',$image_name);
        }
        VenuGallery::create([
            'img'=> $image_name,
            'venu_id'=>$request->venu_id,
        ]);
        return redirect()->route('admin.pages.venu')->with('success','Result Added.');
    }
    public function venuEdit($venu_id)
    {
        $data = Venu::find($venu_id);
        return view('admin.pages.editstadium', compact('data'));

    }

    public function editVenuList(Request $request, $venu_id)
    {
        $data = Venu::find($venu_id);
        $data->name=$request->input('name');
        $data->owner=$request->input('owner');
        $data->capacity=$request->input('capacity');
        $data->location=$request->input('location');
        $data->update();
        return redirect()->route('admin.pages.venu')->with('success','Venu Edited.');
    }

    public function viewimage($id)
    {
        $data1= VenuGallery::find($id);
        return view('admin.pages.venuimage',compact('data1'));

    }

    public function venudelete(Request $request,$id)
    {
        $data= VenuGallery::find($id);
        $image_path = "storage/venu/'.$data->img";
        if(File::exists($image_path)) {
        File::delete($image_path);
        }
        VenuGallery::find($id)->delete();
        return redirect()->route('admin.pages.venu')->with('success','Image Deleted.');
    }

}
