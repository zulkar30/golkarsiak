<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapil extends Model
{
    // Nama tabel
    public $table = 'dapil';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'nama_dapil',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function caleg()
    {
        return $this->hasMany('App\Models\Caleg', 'dapil_id');
    }

    public function kecamatan()
    {
        return $this->hasMany('App\Models\Kecamatan', 'dapil_id');
    }
}
