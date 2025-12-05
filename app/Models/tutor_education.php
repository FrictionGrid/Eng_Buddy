<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tutor_education extends Model
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
        return $this->belongsTo(tutor_profile::class, 'tutor_profile_id');
    }
}
