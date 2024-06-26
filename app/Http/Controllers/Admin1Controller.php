<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\event;
use App\Models\schedule;
use App\Models\announcement;

class Admin1Controller extends Controller
{
    //
   
    public function viewUsers()
    {
        // Ensure you are using the paginate method to get paginated results
       // $users = User::paginate(6); // Adjust the number of items per page as needed
        $users=user::where('role', 2)->paginate(6);
        return view('admin.a_view_users', compact('users'));
    }

    public function viewAnnouncements()
    {
        // Fetch announcements from database
        $announcements = []; // Replace with actual data fetching
        return view('admin.announcements', compact('announcements'));
    }

    public function viewEvents()
    {
        // Fetch events from database
        $events = []; // Replace with actual data fetching
        return view('admin.events', compact('events'));
    }

    public function viewSchedules()
    {
        // Fetch schedules from database
        $schedules = []; // Replace with actual data fetching
        return view('admin.schedules', compact('schedules'));
    }
}
