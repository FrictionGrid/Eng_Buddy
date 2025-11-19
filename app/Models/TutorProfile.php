<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorProfile extends Model
{
    use HasFactory;

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
        'status',
    ];


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
}
