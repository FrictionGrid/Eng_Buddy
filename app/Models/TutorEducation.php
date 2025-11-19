<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_profile_id',
        'degree_level',
        'field_of_study',
        'institution',
        'gpa',
    ];

    public function profile()
    {
        return $this->belongsTo(TutorProfile::class, 'tutor_profile_id');
    }
}
