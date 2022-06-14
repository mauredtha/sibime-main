@extends('users.Layout')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Name</th>
                    <th>Email</th>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
            <tr>
            <td>{{ $student->kode }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>

            <td><a href="{{ route('student_absences',[$class_id, $student->kode])}}" class="btn btn-primary">Detail Absensi</a></td>
            <td><a href="{{ route('class_mapel',[$class_id, $student->kode])}}" class="btn btn-primary">Detail Nilai</a></td>
            </tr>
@endforeach
</tbody>
</table>
{!! $students->links() !!}
</div>
</div>
@endsection
