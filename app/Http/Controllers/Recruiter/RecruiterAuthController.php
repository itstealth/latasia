<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.recruiter.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('recruiter')->attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate(); // prevent session fixation
        return redirect()->intended(route('recruiter.dashboard'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput();
}


    public function logout(Request $request)
    {
        Auth::guard('recruiter')->logout();
        return redirect('/recruiter/login');
    }
}
