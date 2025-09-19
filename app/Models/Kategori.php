<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris_surat';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function arsips()
    {
        return $this->hasMany(Arsip::class, 'kategori_id', 'id_kategori');
    }
}
