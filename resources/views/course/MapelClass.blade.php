@extends('course.Layout')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
            <tr>
            <td>{{ $course->name }}</td>

            <td><a href="{{ route('student_grades',[$class_id, $kode_siswa, $course->id])}}" class="btn btn-primary">Rekap Nilai</a></td>
            </tr>
@endforeach
</tbody>
</table>
{!! $courses->links() !!}
</div>
</div>
@endsection
