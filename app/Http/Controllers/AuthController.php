<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $redirect = $request->input('redirect');
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            if (!empty($redirect)) {
                return redirect()->to($redirect);
            }
            return redirect()->intended()->with('success', 'Welcome Back ' . $request->user()->name);
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
        $user = User::create($cleanData);
        Auth::login($user);
        Session::flash('success', 'You have successfully Signed up!');
        return redirect('/');
    }

    public function logout(Request $request)
    {

        $user = $request->user();
        auth()->logout($user);
        Session::flash('success', 'You have successfully logged out!');
        return redirect('/');
    }
}
