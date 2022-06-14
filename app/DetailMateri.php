<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailMateri extends Model
{
    protected $fillable = [
        'materi',
        'latihan',
        'ulangan_harian',
        'remedial',
        'id_komponen_mapel',
        'created_at',
        'updated_at',
        'kode_siswa'
       ];
}
