<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    // Nama tabel
    public $table = 'kegiatan';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'caleg_id',
        'user_id',
        'desa_id',
        'kecamatan_id',
        'nama_kegiatan',
        'tanggal',
        'waktu',
        'lokasi',
        'status',
        'keterangan1',
        'keterangan2',
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

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function caleg()
    {
        return $this->belongsTo('App\Models\Caleg', 'caleg_id', 'id');
    }
}
