<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kecamatan_id',
        'desa_id',
        'tps_id',
        'caleg_id',
        'paket_id',
        'name',
        'email',
        'password',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relasi many to many
    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    // Relasi one to many
    public function role_user()
    {
        return $this->hasMany('App\Models\RoleUser', 'user_id');
    }

    public function saksi()
    {
        return $this->hasMany('App\Models\Saksi', 'user_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'kecamatan_id', 'id');
    }

    public function desa()
    {
        return $this->belongsTo('App\Models\Desa', 'desa_id', 'id');
    }

    public function tps()
    {
        return $this->belongsTo('App\Models\Tps', 'tps_id', 'id');
    }

    public function caleg()
    {
        return $this->belongsTo('App\Models\Caleg', 'caleg_id', 'id');
    }

    public function paket()
    {
        return $this->belongsTo('App\Models\Paket', 'paket_id', 'id');
    }
}
