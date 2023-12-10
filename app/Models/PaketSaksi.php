<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketSaksi extends Model
{
    // Nama tabel
    public $table = 'paket_saksi';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'paket_id',
        'saksi_id',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function paket()
    {
        return $this->belongsTo('App\Models\Paket', 'paket_id', 'id');
    }

    // Relasi one to many
    public function saksi()
    {
        return $this->belongsTo('App\Models\Saksi', 'saksi_id', 'id');
    }
}
