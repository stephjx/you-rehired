<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Company;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyAuthController extends Controller
{
    public function showCompanyRegistrationForm()
    {
        return view('auth.company.register');
    }

    public function registerCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'subdomain' => 'required|string|alpha_dash|unique:tenants,subdomain|min:3|max:50',
            'email' => 'required|email|unique:users,email|unique:tenants,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'terms' => 'accepted',
        ], [
            'subdomain.unique' => 'This subdomain is already taken.',
            'subdomain.alpha_dash' => 'Subdomain can only contain letters, numbers, dashes and underscores.',
            'terms.accepted' => 'You must accept the terms and conditions.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create tenant
        $tenant = Tenant::create([
            'name' => $request->company_name,
            'subdomain' => $request->subdomain,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'active',
        ]);

        // Create company
        $company = Company::create([
            'tenant_id' => $tenant->id,
            'name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'active',
        ]);

        // Create default user
        $user = User::create([
            'name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tenant_id' => $tenant->id,
            'user_type' => 'company',
        ]);

        // Create default roles
        $adminRole = Role::create([
            'tenant_id' => $tenant->id,
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator role with full permissions',
            'permissions' => ['*'],
            'is_default' => true,
            'is_system_role' => false,
        ]);

        $managerRole = Role::create([
            'tenant_id' => $tenant->id,
            'name' => 'Manager',
            'slug' => 'manager',
            'description' => 'Manager role with limited administrative permissions',
            'permissions' => ['jobs.create', 'jobs.edit', 'candidates.view', 'reports.view'],
            'is_default' => false,
            'is_system_role' => false,
        ]);

        $hrRole = Role::create([
            'tenant_id' => $tenant->id,
            'name' => 'HR',
            'slug' => 'hr',
            'description' => 'HR role with personnel management permissions',
            'permissions' => ['candidates.view', 'candidates.manage', 'interview.schedule'],
            'is_default' => false,
            'is_system_role' => false,
        ]);

        // Assign admin role to the user
        $user->roles()->attach($adminRole->id);

        // Log in the user
        auth()->login($user);

        return redirect('/');
    }

    public function showCompanyLoginForm()
    {
        return view('auth.company.login');
    }

    public function loginCompany(Request $request)
    {
        $request->validate([
            'subdomain' => 'required|string|exists:tenants,subdomain',
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);

        // Find tenant by subdomain
        $tenant = Tenant::where('subdomain', $request->subdomain)->first();
        
        if (!$tenant || $tenant->status !== 'active') {
            return redirect()->back()->withErrors([
                'subdomain' => 'Invalid tenant subdomain.',
            ]);
        }

        // Find user associated with this tenant
        $user = User::where('email', $request->email)
                    ->where('tenant_id', $tenant->id)
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        // Log in the user
        auth()->login($user, $request->remember);

        return redirect()->intended('/');
    }
}
