<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Cache;

class RbacService
{
    /**
     * Check if a user has a specific role
     */
    public function userHasRole(User $user, string $roleSlug): bool
    {
        return $user->hasRole($roleSlug);
    }

    /**
     * Check if a user has any of the specified roles
     */
    public function userHasAnyRole(User $user, array $roleSlugs): bool
    {
        return $user->hasAnyRole($roleSlugs);
    }

    /**
     * Check if a user has a specific permission
     */
    public function userHasPermission(User $user, string $permission): bool
    {
        return $user->hasPermission($permission);
    }

    /**
     * Get all permissions for a user
     */
    public function getUserPermissions(User $user): array
    {
        $permissions = [];

        foreach ($user->roles as $role) {
            $rolePermissions = $role->getAllPermissions();
            $permissions = array_merge($permissions, $rolePermissions);
        }

        return array_unique($permissions);
    }

    /**
     * Get all roles for a tenant
     */
    public function getTenantRoles(int $tenantId): \Illuminate\Database\Eloquent\Collection
    {
        return Role::where('tenant_id', $tenantId)->get();
    }

    /**
     * Create a new role for a tenant
     */
    public function createRole(int $tenantId, array $data): Role
    {
        $data['tenant_id'] = $tenantId;
        $data['slug'] = strtolower(str_replace(' ', '-', $data['name']));
        
        return Role::create($data);
    }

    /**
     * Assign a role to a user
     */
    public function assignRoleToUser(User $user, int $roleId): void
    {
        $user->roles()->attach($roleId);
        
        // Clear any cached permissions
        Cache::forget("user_permissions_{$user->id}");
    }

    /**
     * Remove a role from a user
     */
    public function removeRoleFromUser(User $user, int $roleId): void
    {
        $user->roles()->detach($roleId);
        
        // Clear any cached permissions
        Cache::forget("user_permissions_{$user->id}");
    }

    /**
     * Check if a role exists for a tenant
     */
    public function roleExistsForTenant(string $roleSlug, int $tenantId): bool
    {
        return Role::where('slug', $roleSlug)
                   ->where('tenant_id', $tenantId)
                   ->exists();
    }

    /**
     * Get predefined roles for tenant setup
     */
    public function getDefaultRoles(): array
    {
        return [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator role with full permissions',
                'permissions' => ['*']
            ],
            [
                'name' => 'Manager',
                'slug' => 'manager',
                'description' => 'Manager role with limited administrative permissions',
                'permissions' => [
                    'jobs.create', 'jobs.edit', 'candidates.view', 'reports.view',
                    'interview.schedule', 'applications.manage'
                ]
            ],
            [
                'name' => 'HR',
                'slug' => 'hr',
                'description' => 'HR role with personnel management permissions',
                'permissions' => [
                    'candidates.view', 'candidates.manage', 'interview.schedule',
                    'applications.view', 'reports.view'
                ]
            ],
            [
                'name' => 'Recruiter',
                'slug' => 'recruiter',
                'description' => 'Recruiter role with candidate sourcing permissions',
                'permissions' => [
                    'candidates.view', 'candidates.create', 'applications.view',
                    'interview.schedule'
                ]
            ]
        ];
    }

    /**
     * Create default roles for a tenant
     */
    public function createDefaultRolesForTenant(int $tenantId): void
    {
        $defaultRoles = $this->getDefaultRoles();

        foreach ($defaultRoles as $roleData) {
            Role::firstOrCreate([
                'tenant_id' => $tenantId,
                'slug' => $roleData['slug'],
            ], [
                'name' => $roleData['name'],
                'description' => $roleData['description'],
                'permissions' => $roleData['permissions'],
                'is_default' => false,
                'is_system_role' => false,
            ]);
        }
    }
}