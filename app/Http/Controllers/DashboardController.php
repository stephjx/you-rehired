<?php

namespace App\Http\Controllers;

use App\Services\RbacService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $rbacService;

    public function __construct(RbacService $rbacService)
    {
        $this->rbacService = $rbacService;
    }

    public function index()
    {
        // Check if job seeker is authenticated
        if (Auth::guard('job_seeker')->check()) {
            $jobSeeker = Auth::guard('job_seeker')->user();
            return view('jobseeker.dashboard', compact('jobSeeker'));
        } 
        
        // Check if regular user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $tenant = $user->tenant;
            $permissions = $this->rbacService->getUserPermissions($user);
            $roles = $user->roles;
            
            return view('company.dashboard', compact('user', 'tenant', 'permissions', 'roles'));
        }
        
        // Redirect to login if no user is authenticated
        return redirect()->route('login');
    }
}
