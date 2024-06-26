<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\event;
use App\Models\schedule;
use App\Models\comment;
use App\Models\course;
use App\Models\announcement;

class AdminController extends Controller
{
    

    public function viewUsers()
    {
        // Fetch users with pagination
        //$users = User::paginate(6); // Change the number as needed
        $users=user::where('role', 2)->paginate(8);
        return view('admin.a_view_users', compact('users'));
    }
   

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Approved';
        $user->save();
        return redirect()->route('admin.view_users');
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Blocked';
        $user->save();
        return redirect()->route('admin.view_users');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.view_users');
    }

    public function dashboard1()
    {
        $user_count=user::all();
    $event_count=event::all();
    $announcement_count=announcement::all();
    $comment_count=comment::all();
    $schedule_count=schedule::all();

    return view('admin/a_contents', 
    [
        'users_list_count'=>$user_count, 
         'events_number'=>$event_count,
         'announcement_number'=> $announcement_count,
         'comments_number'=>$comment_count,
         'schedules_number'=>$schedule_count,
]);
    }
    
    public function dashboard(){
        return view('admin/admin_dashboard');
    }

}
