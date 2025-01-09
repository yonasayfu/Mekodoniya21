<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Inertia\Inertia;

class EventController extends Controller
{
    // Display a list of events
    public function index()
    {
        $events = Event::with(['facility', 'staff', 'catering'])->get();
        return Inertia::render('Events/Index', ['events' => $events]);
    }

    // Show the form for creating a new event
    public function create()
    {
        return Inertia::render('Events/Create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'location' => 'required|string',
            'facility_id' => 'required|exists:facilities,id',
            'staff_id' => 'required|exists:staff,id',
            'catering_id' => 'required|exists:caterings,id',
            'custom_requirements' => 'nullable|string',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index');
    }

    // Display the specified event
    public function show(Event $event)
    {
        return Inertia::render('Events/Show', ['event' => $event]);
    }

    // Show the form for editing the specified event
    public function edit(Event $event)
    {
        return Inertia::render('Events/Edit', ['event' => $event]);
    }

    // Update the specified event in the database
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'location' => 'required|string',
            'facility_id' => 'required|exists:facilities,id',
            'staff_id' => 'required|exists:staff,id',
            'catering_id' => 'required|exists:caterings,id',
            'custom_requirements' => 'nullable|string',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index');
    }

    // Remove the specified event from the database
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
