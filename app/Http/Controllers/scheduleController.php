<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\schedule;
use Exception;

class scheduleController extends Controller
{
    //
    public function create()
    {
        // You may want to pass any necessary data to the view here
        return view('admin.schedules.create');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
        ]);
    
        // Create a new Schedule instance with the validated data
    
        // Redirect the user to a relevant page after creating the schedule
        return redirect()->route('admin.schedules.create')->with('success', 'Schedule created successfully!');
    }
    
    public function edit(schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }
    
    

    public function index()
    {
        // Fetch all schedules from the database
        $schedules = Schedule::all();

        // Pass the schedules data to the view
        return view('admin.schedules.index', compact('schedules'));
    }
    public function destroy($id)
{
    $schedule = Schedule::findOrFail($id);
    $schedule->delete();

    return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully!');
}
public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'event_id' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'location' => 'required',
    ]);

    // Find the schedule by ID
    $schedule = Schedule::findOrFail($id);

    // Update the schedule with the validated data
    $schedule->update($validatedData);

    // Redirect the user back to the index page with a success message
    return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully!');
}
}
