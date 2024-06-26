<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\event;
use App\Models\schedule;
use App\Models\announcement;
use App\Models\Course;
use App\Models\user_type;
use App\Models\sport_type;
class User1Controller extends Controller
{
    //
    // public function viewUsers()
    // {
    //     // Ensure you are using the paginate method to get paginated results
    //     //$users = User::paginate(6); // Adjust the number of items per page as needed
    //     $users=user::where('role', 2)->paginate(8);
    //     return view('users.views', compact('users'));
    // }
    public function viewUsers()
    {
        // Get all users except the user with id=2 and paginate results
        $users = User::with('types','cors')->where('id', '!=', 2)->paginate(6);
// return response()->json($users);
        // return view('users.views', compact('users'));
        return view('users.views', [
            "users"=>$users,
        ]);
    }
    // public function viewAnnouncements()
    // {
    //     // Fetch announcements from database
    //     $announcements = []; // Replace with actual data fetching
    //     return view('users.announcements', compact('announcements'));
    // }
    public function viewAnnouncements()
    {
        // Fetch announcements from the database
        $announcements = Announcement::all();

        return view('users.announcements', compact('announcements'));
    }

    // public function viewEvents()
    // {
    //     // Fetch events from database
    //     $events = []; // Replace with actual data fetching
    //     return view('users.events', compact('events'));
    // }
    public function viewEvents()
    {
        // Fetch events from the database
        $events = Event::all();

        return view('users.events', compact('events'));
    }
    public function viewHeader()
    {
        return view('users.users_header');
    }
    public function view1Header()
    {
        return view('admin.a_header');
    }

    // public function viewSchedules()
    // {
    //     // Fetch schedules from database
    //     $schedules = []; // Replace with actual data fetching
    //     return view('users.schedules', compact('schedules'));
    // }
    public function viewSchedules()
    {
        // Fetch schedules from the database
        $schedules = Schedule::all();

        return view('users.schedules', compact('schedules'));
    }
}
