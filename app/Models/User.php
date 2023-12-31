<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $keyType = 'string';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'picture',
        'email',
        'password',
        'role',
        'location',
        'phoneNumber',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function jobSeeker()
    {
        return $this->hasOne(JobSeeker::class);
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class);
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }


    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function reacts() {
        return $this->hasMany(React::class);
    }
}
