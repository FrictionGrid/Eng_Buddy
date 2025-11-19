<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_profile_id',
        'has_teaching_experience',
        'teaching_experience_years',
        'work_experience',
        'additional_info',
    ];

    public function profile()
    {
        return $this->belongsTo(TutorProfile::class, 'tutor_profile_id');
    }
}
