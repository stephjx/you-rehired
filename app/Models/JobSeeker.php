<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class JobSeeker extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'birth_date',
        'location',
        'bio',
        'resume_path',
        'profile_image_path',
        'skills',
        'work_experience',
        'education',
        'preferred_roles',
        'social_links',
        'availability_status',
        'status',
        'email_verified_at',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
        'skills' => 'array',
        'work_experience' => 'array',
        'education' => 'array',
        'preferred_roles' => 'array',
        'social_links' => 'array',
        'availability_status' => 'string',
        'status' => 'string',
    ];

    // Accessors
    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public function getResumeUrlAttribute()
    {
        return $this->resume_path ? Storage::url($this->resume_path) : null;
    }

    public function getProfileImageUrlAttribute()
    {
        return $this->profile_image_path ? Storage::url($this->profile_image_path) : null;
    }

    public function getSkillsListAttribute()
    {
        return $this->skills ? implode(', ', $this->skills) : '';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeAvailable($query)
    {
        return $query->where('availability_status', 'available');
    }

    public function scopeNegotiating($query)
    {
        return $query->where('availability_status', 'negotiating');
    }

    public function scopeUnavailable($query)
    {
        return $query->where('availability_status', 'unavailable');
    }

    // Helper Methods
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isAvailable(): bool
    {
        return $this->availability_status === 'available';
    }

    public function isNegotiating(): bool
    {
        return $this->availability_status === 'negotiating';
    }

    public function isUnavailable(): bool
    {
        return $this->availability_status === 'unavailable';
    }

    public function hasResume(): bool
    {
        return !empty($this->resume_path);
    }

    public function hasProfileImage(): bool
    {
        return !empty($this->profile_image_path);
    }
}