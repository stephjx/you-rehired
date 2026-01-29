<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleSwitchController extends Controller
{
    public function showSwitchForm()
    {
        $user = Auth::user();
        $availableRoles = $user->roles;
        
        return view('auth.role-switch', compact('user', 'availableRoles'));
    }

    public function switchRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = Auth::user();
        $role = Role::findOrFail($request->role_id);

        // Check if user actually has this role
        if (!$user->roles()->where('id', $role->id)->exists()) {
            return redirect()->back()->withErrors(['role_id' => 'You do not have access to this role.']);
        }

        // Store the active role in session
        session(['active_role' => $role->id]);

        return redirect()->route('dashboard')
                        ->with('success', 'Switched to ' . $role->name . ' role successfully.');
    }

    public function getCurrentRole()
    {
        $user = Auth::user();
        $activeRoleId = session('active_role');
        
        if ($activeRoleId) {
            return $user->roles()->where('id', $activeRoleId)->first();
        }
        
        // Return first role if no active role is set
        return $user->roles()->first();
    }

    public function getAvailableRoles()
    {
        return Auth::user()->roles;
    }
}
