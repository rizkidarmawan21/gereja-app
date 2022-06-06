<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RegIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('pages.home', compact('events'));
    }

    public function myEvent(){
        $events = RegIbadah::with(['event'])->where('user_id',Auth::user()->id)->get();
        return view('pages.my-event',compact('events'));
    }

    public function profile(){
        
        return view('pages.profile');
    }

    public function ticket($id){
        $ticket = RegIbadah::with(['event'])->findOrFail($id);
        return view('pages.my-ticket',compact('ticket'));
    }
}

