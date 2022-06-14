<?php
namespace App\Exports;

use App\Nilais;
use App\Classes;
use App\Courses;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NilaiExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct($id, $kode)
    {
        $this->id = $id;
        $this->kode = $kode;
    }

    public function query()
    {
        $data = Nilais::query()->where(['id_class' => $this->id, 'kode_guru' => $this->kode]);

        //foreach ($data as $key => $value) {
          //dd($value);
            // $data[$key]['nama_kelas'] = Classes::query()->where('id', $value->id_class)->value('name');
            // $data[$key]['mata_pelajaran'] = Courses::query()->where('id', $value->id_course)->value('name');
        //}

        return $data;
    }

    public function map($data): array
    {
        $data['nama_kelas'] = Classes::query()->where('id', $data->id_class)->value('name');
        $data['mata_pelajaran'] = Courses::query()->where('id', $data->id_course)->value('name');
        
        return [
            $data->nama_kelas,
            $data->mata_pelajaran,
            $data->kode_siswa,
            $data->nama,
            $data->nilai,
        ];
    }

    public function headings(): array
    {
        return [
            'Kelas',
            'Mata Pelajaran',
            'Kode Siswa',
            'Nama Siswa',
            'Nilai'
        ];
    }
}
