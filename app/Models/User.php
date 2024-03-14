<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\AnaerobicDigester;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'otp_code',
        'expire_at',
        'image',
        'email_verified_at',
        'role',
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
    ];



    // Each user has many anaerobic digesters
    public function anaerobic_digesters() : HasMany
    {
        return $this->hasMany(AnaerobicDigester::class);
    }


    public function generateCode(){
        $this->timestamps = false;
        $this->otp_code = rand(1000,9999);
        $this->expire_at = now()->addMinutes(15);
        $this->save();
    }

    public function resetGenerateCode(){
        $this->timestamps = false;
        $this->otp_code = null;
        $this->expires_at = null;
        $this->save();
    }
}




