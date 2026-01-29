<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    
    use \App\Traits\TenantScoped;

    protected $fillable = [
        'tenant_id',
        'name',
        'slug',
        'description',
        'permissions',
        'is_default',
        'is_system_role',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_default' => 'boolean',
        'is_system_role' => 'boolean',
    ];

    // Relationships
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_user_role')
                    ->withTimestamps();
    }

    // Scopes
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    public function scopeSystemRole($query)
    {
        return $query->where('is_system_role', true);
    }

    public function scopeForTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }

    public function scopeForCurrentTenant($query)
    {
        if (session()->has('current_tenant')) {
            return $query->where('tenant_id', session('current_tenant'));
        }
        return $query;
    }

    // Helper Methods
    public function hasPermission(string $permission): bool
    {
        if (!$this->permissions) {
            return false;
        }

        return in_array($permission, $this->permissions) || in_array('*', $this->permissions);
    }

    public function hasAnyPermission(array $permissions): bool
    {
        if (!$this->permissions) {
            return false;
        }

        foreach ($permissions as $permission) {
            if (in_array($permission, $this->permissions) || in_array('*', $this->permissions)) {
                return true;
            }
        }

        return false;
    }

    public function getAllPermissions(): array
    {
        return $this->permissions ?: [];
    }

    public function isDefault(): bool
    {
        return $this->is_default;
    }

    public function isSystemRole(): bool
    {
        return $this->is_system_role;
    }

    public function isAssignable(): bool
    {
        return !$this->is_system_role;
    }
}