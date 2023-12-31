<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'seeker_id',
        'title',
        'dateBirthday',
        'EducationLevel',
        'educationDescription',
        'experience',
        'experienceDescription',
        'skills',
        'cv',
        'languages',
        'linkedinLink',
        'user_id'
    ];
    protected $casts = [
        'skills' => 'array',
        'languages' => 'array'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    public function postulates()
    {
        return $this->hasMany(Postulate::class);
    }
}
