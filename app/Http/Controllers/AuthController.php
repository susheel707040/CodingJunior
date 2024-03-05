<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard', ['users' => $users]);
    }
    public function loginForm(){
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        } else {
            return back()->withErrors(['email' => 'Please check your email and password']);
        }
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withInput()->withErrors(['password' => 'The password confirmation does not match.']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Log in the user after registration
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Registration Successful');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login')->with('error',"Logout Successfully done!");
    }

}
