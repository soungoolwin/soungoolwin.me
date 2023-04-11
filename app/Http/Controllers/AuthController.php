<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Jobs\SendVerificationMail;
use App\Mail\AccVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('components.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'string'],
            'password' => 'required'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email is already taken.'
        ]);
        $validated = $validator->validated();
        $user = User::where('email', $validated['email'])->first();
        if (!is_null($user->email_verification_token)) {
            return back()->withErrors([
                'email' => 'Your email address is not verified. Please check your email inbox and verify first.',
            ]);
        }
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended()->with('success', 'Welcome ' . $request->user()->username);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function showsignup()
    {
        return view('components.signup');
    }
    public function signup(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|unique:users|max:255',
                'email' => 'required|unique:users|email|max:255',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required'
            ],
            [
                'username.required' => 'The username field is required.',
                'username.unique' => 'The username is already taken.',
                'email.required' => 'The email field is required.',
                'email.unique' => 'The email address is already registered.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least :min characters.',
                'password.confirmed' => 'The password confirmation does not match.',
            ]
        );

        if ($validator->fails()) {
            return redirect('/signup')
                ->withErrors($validator)
                ->withInput();
        }
        $cleanData = $validator->validated();
        $cleanData['email_verification_token'] = Str::random(60);
        $user = User::create([
            'username' => $cleanData['username'],
            'email' => $cleanData['email'],
            'password' => $cleanData['password'],
            'email_verification_token' => $cleanData['email_verification_token']
        ]);

        // event(new UserRegistered($user));
        SendVerificationMail::dispatch($user);
        return redirect('/login')->with('success', 'Go check your email inbox, verify account and login here');
    }

    public function logout(Request $request)
    {

        $user = $request->user();
        auth()->logout($user);
        Session::flash('success', 'You have successfully logged out!');
        return redirect('/');
    }

    public function verifyEmail(Request $request, $token)
    {
        $user = User::where('email_verification_token', $token)->firstOrFail();

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return redirect('/signup/verify');
    }
    public function showverifytemplate()
    {
        return view('components.emailverifytemplate');
    }
}
