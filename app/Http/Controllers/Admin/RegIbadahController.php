<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\RegIbadah;
use Illuminate\Http\Request;

class RegIbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        return view('pages.admin.regIbadah.index',[
            'event' => $event,
            'regIbadah' => RegIbadah::all(),
            'titlePage' => 'Semua Data Pendaftar'
        ]);
    }
    public function byEvent($event_id)
    {
        $event = Event::all();
        $data = Event::findOrFail($event_id);
        return view('pages.admin.regIbadah.index',[
            'event' => $event,
            'regIbadah' => RegIbadah::with(['event','capacities'])->where('event_id',$event_id)->get(),
            'titlePage' => 'Data Pendaftar '.$data->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegIbadah  $regIbadah
     * @return \Illuminate\Http\Response
     */
    public function show(RegIbadah $regIbadah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegIbadah  $regIbadah
     * @return \Illuminate\Http\Response
     */
    public function edit(RegIbadah $regIbadah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegIbadah  $regIbadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegIbadah $regIbadah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegIbadah  $regIbadah
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegIbadah $regIbadah)
    {
        //
    }
}
