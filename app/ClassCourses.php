<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassCourses extends Model
{
    protected $fillable = [
        'level',
        'tahun_ajaran',
        'mapel',
        'guru',
        'kelas'
       ];
}
