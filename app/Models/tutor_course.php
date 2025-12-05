<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tutor_course extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'description',
        'location',
        'day',
        'time',
        'rate',
        'job_code',
        'status',
    ];

 
}
