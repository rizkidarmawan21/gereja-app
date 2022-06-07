<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\RegIbadah;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // get count of all users where roles = USER
        $jemaatCount = User::where('roles', 'USER')->count();
        
        
        // get count of all events
        $eventsCount = Event::count();

        // get count of all regIbadah
        $regIbadahCount = RegIbadah::count();

        $dataCount = [
            'jemaatCount' => $jemaatCount,
            'eventsCount' => $eventsCount,
            'regIbadahCount' => $regIbadahCount
        ];

        return view('pages.admin.dashboard',compact('dataCount'));
    }
}
