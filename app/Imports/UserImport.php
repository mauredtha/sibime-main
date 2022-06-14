<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'kode' => $row[0],
            'name' => $row[1],
            'password' => Hash::make($row[2]),
            'role' => $row[3],
            'class_id' => $row[4],
        ]);
    }
}
