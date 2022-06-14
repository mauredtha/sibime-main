<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    protected $fillable = [
        'id_class',
        'kode_siswa',
        'nama',
        'status_kehadiran',
        'tahun_ajar',
        'kode_guru',
        'created_at',
        'updated_at',
        'alasan',
        'doc'
       ];
}
