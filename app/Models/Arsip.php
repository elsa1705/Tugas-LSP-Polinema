<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip_surat';
    protected $primaryKey = 'id_arsip';
    protected $fillable = [
        'nomor_surat',
        'judul_surat',
        'kategori_id',
        'tanggal_upload',
        'file_surat',
        'path_file',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
