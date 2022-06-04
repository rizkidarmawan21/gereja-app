<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('pages.home', compact('events'));
    }

    public function myEvent(){
        return view('pages.my-event');
    }

    public function profile(){
        
        return view('pages.profile');
    }
}

