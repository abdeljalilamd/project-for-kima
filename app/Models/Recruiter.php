<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'recruiter_id',
        'industry',
        'companyName',
        'companySize',
        'companyWebsite',
        'aboutCompany',
        'companyOverview',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function messages()
    {
        return $this->hasMany(Chat::class);
    }
}
