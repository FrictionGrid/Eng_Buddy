<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // ข้อมูลพื้นฐาน
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

        // ข้อมูลประสบการณ์การสอน
        'has_teaching_experience',
        'teaching_experience_years',
        'work_experience',
        'additional_info',

        // ข้อมูลการยอมรับเงื่อนไข
        'accepted_terms_at',
        'accepted_privacy_at',

        // สถานะและการอนุมัติ
        'status',
        'rejection_reason',
        'suspended_at',
        'approved_at',
        'approved_by',
    ];

    /**
     * ระบุ data types สำหรับ attributes
     */
    protected $casts = [
        'has_teaching_experience' => 'boolean',
        'teaching_experience_years' => 'decimal:1',
        'accepted_terms_at' => 'datetime',
        'accepted_privacy_at' => 'datetime',
        'approved_at' => 'datetime',
        'suspended_at' => 'datetime',
    ];

    /**
     * Accessor: ชื่อเต็ม
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Scope: ดึงเฉพาะ tutors ที่ได้รับการอนุมัติ
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope: ดึงเฉพาะ tutors ที่รออนุมัติ
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educations()
    {
        return $this->hasMany(TutorEducation::class);
    }

    public function subjects()
    {
        return $this->hasMany(TutorSubject::class);
    }

    public function experience()
    {
        return $this->hasOne(TutorExperience::class);
    }

    /**
     * ผู้ดูแลระบบที่อนุมัติ
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
