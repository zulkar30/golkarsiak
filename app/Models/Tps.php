<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    // Nama tabel
    public $table = 'tps';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'desa_id',
        'nama_tps',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function desa()
    {
        return $this->belongsTo('App\Models\Desa', 'desa_id', 'id');
    }

    public function saksi()
    {
        return $this->hasMany('App\Models\Saksi', 'tps_id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\Users', 'tps_id');
    }
}
