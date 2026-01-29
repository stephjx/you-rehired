<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a tenant for the admin
        $tenant = Tenant::firstOrCreate([
            'name' => 'Platform Admin',
            'subdomain' => 'admin',
            'email' => 'admin@yourehired.com',
        ], [
            'status' => 'active',
        ]);

        // Create a company for the admin
        $company = Company::firstOrCreate([
            'tenant_id' => $tenant->id,
            'email' => 'admin@yourehired.com',
        ], [
            'name' => 'Platform Admin Company',
            'status' => 'active',
        ]);

        // Create the admin user
        $adminUser = User::firstOrCreate([
            'email' => 'admin@yourehired.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant->id,
            'user_type' => 'company', // Using company type for admin
        ]);

        // Create an admin role if it doesn't exist
        $adminRole = Role::firstOrCreate([
            'slug' => 'admin',
        ], [
            'tenant_id' => $tenant->id,
            'name' => 'Admin',
            'description' => 'Administrator with full platform access',
            'permissions' => ['*'], // All permissions
            'is_default' => false,
            'is_system_role' => true,
        ]);

        // Attach the admin role to the user with the company association
        $adminUser->roles()->attach($adminRole->id, [
            'company_id' => $company->id,
            'assigned_by' => $adminUser->id,
            'assigned_at' => now()
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@yourehired.com');
        $this->command->info('Password: password');
    }
}