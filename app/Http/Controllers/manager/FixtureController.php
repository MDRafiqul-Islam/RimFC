<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    public function showFixture()
    {
        $fixture=Fixture::all();
        return view('manager.pages.fixture',compact('fixture'));
    }

    public function formation($fixture_id)
    {
        $fixture=Fixture::find($fixture_id);
        return view('manager.pages.formation',compact('fixture'));
    }


}
