<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingTypeController extends Controller
{
    public function trainingtypelist()
    {
        return view('manager.pages.trainingtype');
    }
}
