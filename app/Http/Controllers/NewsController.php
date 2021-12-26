<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $newses = News::all();
        return view('admin.pages.news', compact('newses'));
    }

    public function create()
    {
        return view('admin.pages.createnews');
    }

    public function addnews(Request $request)
    {
        $image_name=null;
        if($request->hasFile('photo'))
        {
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/news',$image_name);

        }
        News::create([
            'photo'=> $image_name,
            'headline'=>$request->headline,
            'detailes'=>$request->detailes,
        ]);
        return redirect()->back()->with('success','News Created Successfully.');
    }
}

