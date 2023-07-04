<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Jobs\SendVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\DiscordNotificationService;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $discordNotificationService;
    public function __construct(DiscordNotificationService $discordNotificationService)
    {
        $this->discordNotificationService = $discordNotificationService;
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
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $validated = $validator->validated();

        $user = User::where('email', $validated['email'])->first();



        if (Auth::attempt($validated) && is_null($user->email_verification_token)) {

            $this->discordNotificationService->sendUserSignupNotification($validated);

            $user = Auth::user();

            // Return the user data in the response
            return response()->json([
                'user' => $user,
                'message' => 'Login successful',
                'status' => 200,
            ]);
        }

        if (!Auth::attempt($validated)) {

            return response()->json(['message' => 'The provided credentials do not match our records.', 'status' => 422]);
        }
        if (!is_null($user->email_verification_token)) {

            return response()->json(['message' => 'Your email address is not verified. Please check your email inbox and verify first.', 'status' => 401]);
        }
    }

    public function logout(Request $request)
    {
        $username = $request->user()->username;
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully', 'username' => $username]);
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
            return response()->json(['errors' => $validator->errors()], 422);
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

        return response()->json([
            'user' => $user,
            'message' => 'Signup successful',
            'status' => 200,
        ]);
    }

    public function verifyEmail(Request $request, $token)
    {
        $user = User::where('email_verification_token', $token)->firstOrFail();

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return redirect('/api/signup/verify');
    }

    public function showverifytemplate()
    {
        return view('components.emailverifytemplate');
    }
}
