<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    // Nama tabel
    public $table = 'kecamatan';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'dapil_id',
        'nama_kecamatan',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function dapil()
    {
        return $this->belongsTo('App\Models\Dapil', 'dapil_id', 'id');
    }

    public function desa()
    {
        return $this->hasMany('App\Models\Desa', 'kecamatan_id');
    }

    public function saksi()
    {
        return $this->hasMany('App\Models\Saksi', 'kecamatan_id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User', 'kecamatan_id');
    }
}
