<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('admin.pages.gallery');
    }

    public function createGallery()
    {
        return view('a');
    }
}
