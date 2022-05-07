<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\RegIbadah;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function ticket(){
        return view('pages.ticket');
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
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'event_id' => 'required',
            // 'seat_number' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phoneNumber' => 'required',
            'capacity_id'=> 'required',
            'transportasi' =>'required',
            'status_anggota' => 'required'
        ]);


        $validation['status_kehadiran'] = 'belum hadir';
        $validation['seat_number'] = 1;

        RegIbadah::create($validation);
        
        $dataRegIbadah = [
            'name' =>$request->name,
            'event' => Event::findOrFail($request->event_id)->get(),
            'seat_number' => 1,
            'status_kehadiran' => '0',  // 0 = belum hadir,1 = sudah hadir
        ];

        return view('pages.ticket');
        // echo "success daftar";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
