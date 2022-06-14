@extends('absence.Layout')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Kode Guru</th>
                    <th>Jumlah Kehadiran</th>
                </tr>
            </thead>
            <tbody>
            @foreach($absences as $absence)
            <tr>
            <td>{{ $absence->mapel }}</td>
            <td>{{ $absence->kode_guru }}</td>
            <td>{{ $absence->total_hadir }}</td>
            </tr>
@endforeach
</tbody>
</table>
{!! $absences->links() !!}
</div>
</div>
@endsection
