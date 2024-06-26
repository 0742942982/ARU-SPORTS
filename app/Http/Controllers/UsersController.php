<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_type;
use App\Models\Sport_type;
use App\Models\Course;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    
    public function dashboard()
    {
        return view('users/u_dashboard');
    }
    //showProfile
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */

    public function register()
    {
        $courses = Course::all();
        $userTypes = User_type::all();
        $sportTypes = Sport_type::all();

        // Pass data to the view using consistent variable names
        return view('users.register', [
            'user_types' => $userTypes,
            'sport_types' => $sportTypes,
            'courses' => $courses,
        ]);
    }

    /**
     * Handle the registration form submission.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\RedirectResponse
     */


    public function register_check(Request $req)
    {
        try {

        $newUser = new User();

        $newUser->status = 0;
        $newUser->behavior = 1;
        $newUser->role = 2;
        $newUser->written_course = $req->written_course;
        $newUser->course = $req->course;
        $newUser->user_type = $req->user_type;
        $newUser->sport_type = $req->sport_type;
        $newUser->fname = $req->fname;
        $newUser->lname = $req->lname;
        $newUser->gender = $req->gender;
        $newUser->phone = $req->phone;
        $newUser->email = $req->email;
        $newUser->registration_number = $req->registration_number;
        $newUser->password = Hash::make($req->password);

        if ($req->hasFile('profile_photo')) {
            $image = $req->file('profile_photo');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_photos'), $image_name);
            $newUser->profile_photo = $image_name;
        }

       
            $created_user = $newUser->save();

            if ($created_user) {
                return redirect('/home')->with('success', 'Account created successfully.');
            } else {
                return redirect()->route('register')->with('registration_failed', 'Registration failed.');
            }
        } catch (\Exception $e) {
            return redirect()->route('register')->with('registration_failed', 'Registration failed. Error: ' . $e->getMessage());
        }
    }

/////////
public function login()
    {
        return view('users.login');
    }

    public function login_check(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    Log::info('Attempting login with credentials: ', $credentials);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        Log::info('Login successful for user: ', ['user_id' => $user->id]);

        if ($user->status == '0') {
            Auth::logout();
            Log::info('User not approved: ', ['user_id' => $user->id]);
            return redirect('/login')->with('un_approved_user', 'Your Account is waiting for Admin approval, you cannot login now');
        }

        if ($user->behavior == '0') {
            Auth::logout();
            Log::info('User blocked: ', ['user_id' => $user->id]);
            return redirect('/login')->with('blocked_user', 'ARU disabled this Account, please contact ARU Convocation admin');
        }

        $request->session()->regenerate();
        Log::info('Session regenerated for user: ', ['user_id' => $user->id]);

        if ($user->role == '1') {
            Log::info('Redirecting to admin dashboard for user: ', ['user_id' => $user->id]);
            return redirect()->route('admin.a_contents');
        } else {
            Log::info('Redirecting to user dashboard for user: ', ['user_id' => $user->id]);
            return redirect()->route('u_dashboard');
        }
    } else {
        Log::info('Login failed for credentials: ', $credentials);
        return back()->with('login_failure', 'Login failed');
    }
}
  
public function showProfile()
{
    $user = Auth::user();
    return view('users.view_profile', compact('user'));
}


public function editProfile()
{
    $user = Auth::user();
    return view('users.edit_profile', compact('user'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->fname = $request->fname;
    $user->lname = $request->lname;
    $user->phone = $request->phone;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    if ($request->hasFile('profile_photo')) {
        $profilePhoto = $request->file('profile_photo');
        $profilePhotoName = time() . '.' . $profilePhoto->getClientOriginalExtension();
        $profilePhoto->move(public_path('uploads/profile_photos'), $profilePhotoName);
        $user->profile_photo = $profilePhotoName;
    }

    $user->save();

    return redirect()->route('profile.show')->with('update_success', 'Profile updated successfully');
}
      
}


