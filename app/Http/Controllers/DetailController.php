<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug)
    {
        $event = Event::with(['capacities'])->where('slug', $slug)->firstOrFail();
        return view('pages.detail', compact('event'));
    }
}
