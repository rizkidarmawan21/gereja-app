<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\RegIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phoneNumber' => 'required',
            'capacity_id'=> 'required',
            'transportasi' =>'required',
            'status_anggota' => 'required'
        ]);


        $validation['status_kehadiran'] = 0;

        $validation['user_id'] = Auth::user() ? Auth::user()->id : 0 ;

        $totalKouta = 0;

        //get data kouta
        $dataEvent = Event::with(['capacities'])->findOrFail($request->event_id);

        foreach($dataEvent->capacities as $item){
            $totalKouta += $item->kouta;
        }

        $seat_number = 0;
        for ($i=1; $i <= $totalKouta ; $i++) {
            $dataRegBySeatNumber = RegIbadah::where([['event_id','=',$request->event_id],['seat_number','=',$i]])->get(); 
            if(count($dataRegBySeatNumber) > 0){
                echo "id $i ada di database";
                echo "<br />";
            }else {
                echo "id $i belum ada di database";
                $seat_number = $i;
                break;
            }
        }

        $validation['seat_number'] = $seat_number;

        RegIbadah::create($validation);
        
        // save data in session
        $dataRegIbadah = [
            'name' =>$request->name,
            'event' => Event::findOrFail($request->event_id),
            'seat_number' => $seat_number,
            'status_kehadiran' => '0',  // 0 = belum hadir,1 = sudah hadir
        ];

        return redirect()->route('ticket')->with('data_reg' ,$dataRegIbadah);
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
        
    }
}
