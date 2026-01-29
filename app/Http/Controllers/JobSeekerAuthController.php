<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class JobSeekerAuthController extends Controller
{
    public function showJobSeekerRegistrationForm()
    {
        return view('auth.jobseeker.register');
    }

    public function registerJobSeeker(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:job_seekers,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
            'terms' => 'accepted',
        ], [
            'email.unique' => 'An account with this email already exists.',
            'resume.mimes' => 'Resume must be a PDF, DOC, or DOCX file.',
            'resume.max' => 'Resume must be less than 10MB.',
            'terms.accepted' => 'You must accept the terms and conditions.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle resume upload if present
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Create job seeker
        $jobSeeker = JobSeeker::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume_path' => $resumePath,
            'preferred_roles' => $request->preferred_roles ?? [],
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);

        // Log in the job seeker
        auth()->guard('job_seeker')->login($jobSeeker);

        return redirect()->route('jobseeker.dashboard');
    }

    public function showJobSeekerLoginForm()
    {
        return view('auth.jobseeker.login');
    }

    public function loginJobSeeker(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);

        $jobSeeker = JobSeeker::where('email', $request->email)->first();

        if (!$jobSeeker || !Hash::check($request->password, $jobSeeker->password)) {
            return redirect()->back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        // Check if account is active
        if ($jobSeeker->status !== 'active') {
            return redirect()->back()->withErrors([
                'email' => 'Account is suspended.',
            ]);
        }

        // Log in the job seeker
        auth()->guard('job_seeker')->login($jobSeeker, $request->remember);

        return redirect()->intended(route('jobseeker.dashboard'));
    }

    public function logoutJobSeeker(Request $request)
    {
        auth()->guard('job_seeker')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
