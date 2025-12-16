<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApply extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'line_id',
        'phone',
        'tutor_gender',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
