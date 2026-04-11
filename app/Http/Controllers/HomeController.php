<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Room;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'packages'   => Package::all(),
            'rooms'      => Room::all(),
            'activities' => Activity::all(),
        ]);
    }
}
