<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caleg extends Model
{
    // Nama tabel
    public $table = 'caleg';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'dapil_id',
        'nama_caleg',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function dapil()
    {
        return $this->belongsTo('App\Models\Dapil', 'dapil_id', 'id');
    }

    public function saksi()
    {
        return $this->hasMany('App\Models\Saksi', 'caleg_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\Users', 'caleg_id');
    }
}
