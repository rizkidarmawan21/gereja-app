<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(['capacities'])->get();
        // dd($events);
        return view('pages.admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $validator = $request->all();
        $validator['slug'] = Str::slug($request->title);
        if ($request->hasFile('thumbnail')) {
            $image_path = $request->file('thumbnail')->store('assets/thumbnail', 'public');
            $validator['thumbnail'] = $image_path;
        }

        Event::create($validator);
        return redirect()->route('event.index');
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
        $event = Event::with(['capacities'])->findOrFail($event->id);
        return view('pages.admin.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEventRequest $request, Event $event)
    {
        $validator = $request->all();
        $validator['slug'] = Str::slug($request->title);
        if ($request->hasFile('thumbnail')) {
            $image_path = $request->file('thumbnail')->store('assets/thumbnail', 'public');
            $validator['thumbnail'] = $image_path;
        }

        $event->update($validator);
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // dd($event->thumbnail);

        if($event->thumbnail) {
            Storage::disk('public')->delete($event->thumbnail);
            $event->update(['thumbnail'=>null]);
        }
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event has been deleted');
    }
}
