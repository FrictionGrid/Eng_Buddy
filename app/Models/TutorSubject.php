<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_profile_id',
        'subject_id',
        'hourly_rate',
        'description',
    ];

    // โปรไฟล์ติวเตอร์ (N:1)
    public function profile()
    {
        return $this->belongsTo(TutorProfile::class, 'tutor_profile_id');
    }

 
}
