<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    public function showUser()
    {
        $user=  User::where('role','!=','admin')->get();
        return view('admin.pages.manageuser', compact('user'));
    }
}
