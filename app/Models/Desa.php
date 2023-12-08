<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    // Nama tabel
    public $table = 'desa';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'kecamatan_id',
        'nama_desa',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'kecamatan_id', 'id');
    }

    public function tps()
    {
        return $this->hasMany('App\Models\Tps', 'desa_id');
    }

    public function saksi()
    {
        return $this->hasMany('App\Models\Saksi', 'desa_id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User', 'desa_id');
    }
}
