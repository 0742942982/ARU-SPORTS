<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        return view('users.my_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->fname = $request->input('fname');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

         $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
