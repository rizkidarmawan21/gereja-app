<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capacity;
use Illuminate\Http\Request;

class CapacityController extends Controller
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
    public function store(Request $request , $eventID)
    {

        // echo $eventID ;
        // die;
        $validate = $request->validate([
            // 'event_id' => 'required',
            'region' => 'required',
            'kouta' => 'required',
        ]);

        $validate['event_id'] = $eventID;

        Capacity::create($validate);
        return redirect()->route('event.edit', $eventID);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function show(Capacity $capacity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacity $capacity)
    {
        $capacity = Capacity::findOrFail($capacity->id);

	    return response()->json([
	      'data' => $capacity,
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacity $capacity)
    {
        $validation =  $request->validate([
            'region' => 'required',
            'kouta' => 'required',
        ]);

        $capacity->update($validation);
        return redirect()->route('event.edit', $capacity->event_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacity $capacity)
    {
        $capacity->delete();
        return redirect()->route('event.index');
    }
}
