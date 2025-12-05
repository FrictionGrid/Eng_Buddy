<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor_profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'province',
        'district',
        'postal_code',
        'address',
        'id_card_image',
        'bio',

        'accepted_terms_at',
        'accepted_privacy_at',

        'status',
        'rejection_reason',
        'suspended_at',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'accepted_terms_at' => 'datetime',
        'accepted_privacy_at' => 'datetime',
        'approved_at' => 'datetime',
        'suspended_at' => 'datetime',
    ];

  
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

  
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educations()
    {
        return $this->hasMany(tutor_education::class);
    }

    public function subjects()
    {
        return $this->hasMany(Tutor_subject::class);
    }

    public function experiences()
    {
        return $this->hasMany(tutor_experience::class);
    }

 
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
