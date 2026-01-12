<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // SHOW LOGIN PAGE
    public function showLogin()
    {
        return view('welcome');
    }

    // HANDLE LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            session([
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone ?? '',
                    'location' => $user->location ?? '',
                ]
            ]);

            return redirect()->route('home');
        }

        return back()->with('error', 'Invalid username or password');
    }

    // SHOW SIGNUP PAGE
    public function showSignup()
    {
        return view('signup');
    }

    // HANDLE SIGNUP
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created! Please log in.');
    }

    // SHOW HOME / PROFILE PAGE
    public function home()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        return view('home', [
            'user' => session('user')
        ]);
    }

    // SHOW EDIT PROFILE PAGE
    public function editProfile()
{
    if (!session()->has('user')) {
        return redirect()->route('login');
    }

    $user = User::where('email', session('user.email'))->first();

    return view('edit-profile', compact('user'));
}

    // UPDATE PROFILE
   public function updateProfile(Request $request)
{
    if (!session()->has('user')) {
        return redirect()->route('login');
    }

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'location' => 'nullable',
    ]);

    // Get logged-in user from DB
    $user = User::where('email', session('user.email'))->first();

    // Update database
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->location = $request->location;
    $user->save();

    // Update session (so profile page refreshes immediately)
    session([
        'user' => [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'location' => $user->location,
        ]
    ]);

    return redirect()->route('home')->with('success', 'Profile updated successfully!');
}

    // LOGOUT
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
