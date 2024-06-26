<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\event;

class EventController extends Controller
{
    public function create()
    {
        return view('admin.events.create');
    }
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_name' => 'required',
            'event_description' => 'required',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'event_name' => 'required|max:100',
                'event_description' => 'required',
                'location' => 'required|max:255',
                'start_time' => 'required|date|after:now',
                'end_time' => 'required|date|after:start_time',
            ]);

            Event::create([
                'name' => $validated['event_name'],
                'description' => $validated['event_description'],
                'location' => $validated['location'],
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
            ]);

            return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('events.create')->with('error', 'There was an error creating the event: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

}
