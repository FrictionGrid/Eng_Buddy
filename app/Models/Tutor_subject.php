<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor_subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_profile_id',
        'subject_name',
        'hourly_rate',
        'description',
    ];

    // โปรไฟล์ติวเตอร์ (N:1)
    public function profile()
    {
        return $this->belongsTo(Tutor_profile::class, 'tutor_profile_id');
    }

 
}
