<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function newsdelete($news_id)
    {
        News::find($news_id)->delete();
        return redirect()->back()->with('success','News Deleted.');
    }

    public function newsEdit($news_id)
    {
        $data = News::find($news_id);
        return view('admin.pages.editnewslist', compact('data'));

    }


    public function editNewsList(Request $request, $news_id)
    {
        $data = News::find($news_id);
        if($request->hasFile('photo'))
        {
            $path='storage/players/'.$data->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_name=date('Ymdhis') .'.'. $request->file('photo')->getClientOriginalExtension();
            $file=$request->file('photo')->storeAs('/news',$image_name);
            $data->photo= $image_name;


        }
        $data->headline=$request->input('headline');
        $data->detailes=$request->input('detailes');
        $data->update();
        return redirect()->route('admin.pages.news')->with('success','News Edited.');
    }

}

