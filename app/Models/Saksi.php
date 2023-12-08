<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    // Nama tabel
    public $table = 'saksi';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'caleg_id',
        'user_id',
        'tps_id',
        'desa_id',
        'kecamatan_id',
        'nama',
        'nik',
        'jenis_kelamin',
        'no_hp',
        'umur',
        'foto',
        'keterangan',
        'status',
        'paket_nama1',
        'paket_nama2',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
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

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function caleg()
    {
        return $this->belongsTo('App\Models\Caleg', 'caleg_id', 'id');
    }
}
