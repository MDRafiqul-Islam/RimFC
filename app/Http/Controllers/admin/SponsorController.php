<?php

namespace App\Http\Controllers\admin;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SponsorController extends Controller
{
    public function showsponsor()
    {
        $total_income = 0;
        $data= Sponsor::all();
        foreach ($data as $sponsor) {
            $total_income+=$sponsor->ammount;
        }
        return view('admin.pages.partnerlist',compact('data','total_income'));
    }
    public function createsponsor()
    {
        return view('admin.pages.createpartner');
    }
    public function createsponsorlist(Request $request)
    {
        $image_name=null;
        //dd($request->all());
        if($request->hasFile('photo'))
        {
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/sponsor',$image_name);

        }
        Sponsor::create([
            'date'=>$request->date,
            'name'=>$request->name,
            'ammount'=>$request->ammount,
            'link'=>$request->link,
            'photo'=> $image_name,
        ]);
        return redirect()->route('admin.pages.partnerlist')->with('success','Sponsor Created Successfully.');
    }

    public function sponsorDelete($sponsor_id)
    {
       Sponsor::find($sponsor_id)->delete();
       return redirect()->back()->with('success','Player Deleted.');
    }
    public function sponsoerEdit($sponsor_id)
    {
        $data = Sponsor::find($sponsor_id);
        return view('admin.pages.editpartner', compact('data'));

    }


    public function editSponsorList(Request $request, $sponsor_id)
    {
        $data = Sponsor::find($sponsor_id);
        if($request->hasFile('photo'))
        {
            $path='storage/sponsor/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/sponsor',$image_name);
            $data->photo= $image_name;

        }
        $data->date= $request->input('date');
        $data->name=$request->input('name');
        $data->ammount=$request->input('ammount');
        $data->link=$request->input('link');
        $data->update();
        return redirect()->route('admin.pages.partnerlist')->with('success','Sponsor Edited.');
    }

}
