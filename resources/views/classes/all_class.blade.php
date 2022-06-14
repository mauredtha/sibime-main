@extends('classes.Layout')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Level</th>
                    <th>Name</th>
                    <th>Tahun Ajaran</th>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
            <tr>
            <td>{{ $class->id }}</td>
            <td>{{ $class->level }}</td>
            <td>{{ $class->name }}</td>
            <td>{{ $class->tahun_ajaran }}</td>

            <td><a href="{{ route('all_students',$class->id)}}" class="btn btn-primary">Daftar Siswa</a></td>
            <td><a href="{{ route('all_mapel',$class->id)}}" class="btn btn-primary">Mata Pelajaran</a></td>
            </tr>
@endforeach
</tbody>
</table>
{!! $classes->links() !!}
</div>
</div>
@endsection
