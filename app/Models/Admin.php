<?php

namespace App\Models;

use App\Models\City;
use App\Models\Region;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable =
      [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'region_id',
        'city_id',
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

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
