<?php

namespace App\Traits;

trait TenantScoped
{
    /**
     * Boot the tenant scoped trait for the model.
     */
    public static function bootTenantScoped()
    {
        static::addGlobalScope('tenant', function ($builder) {
            if (session()->has('current_tenant')) {
                $builder->where('tenant_id', session('current_tenant'));
            }
        });
    }

    /**
     * Scope a query to only include records for the current tenant.
     */
    public function scopeForCurrentTenant($query)
    {
        if (session()->has('current_tenant')) {
            return $query->where('tenant_id', session('current_tenant'));
        }
        
        return $query;
    }

    /**
     * Scope a query to only include records for a specific tenant.
     */
    public function scopeForTenant($query, $tenantId)
    {
        return $query->where('tenant_id', $tenantId);
    }

    /**
     * Check if the model belongs to the current tenant.
     */
    public function belongsToCurrentTenant(): bool
    {
        if (!session()->has('current_tenant')) {
            return true; // If no tenant context, assume it belongs
        }

        return $this->tenant_id == session('current_tenant');
    }

    /**
     * Associate the model with the current tenant.
     */
    public function setCurrentTenant(): self
    {
        if (session()->has('current_tenant')) {
            $this->tenant_id = session('current_tenant');
        }

        return $this;
    }
}