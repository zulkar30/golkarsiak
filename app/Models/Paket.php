<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    // Nama tabel
    public $table = 'paket';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'nama_paket',
        'foto',
        'created_at',
        'updated_at',
    ];

    public function saksi()
    {
        return $this->belongsToMany('App\Models\Saksi');
    }

    // Relasi one to many
    public function paket_saksi()
    {
        return $this->hasMany('App\Models\PaketSaksi', 'paket_id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User', 'paket_id');
    }
}
