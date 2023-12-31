<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulate extends Model
{
    use HasFactory;

    protected $fillable = [
        'statusPostulate',
        'offer_id',
        'user_id',
    ];
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }
}
