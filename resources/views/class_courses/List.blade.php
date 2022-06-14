@extends('class_courses.Layout')
@section('content')
@if(Auth::user()->role == 'Admin')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('class_courses.create') }}" >Add</a>
</span>
@endif
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Tahun Ajaran</th>
                    <th>Mapel</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($class_courses as $class)
            <tr>
            <td>{{ $class->level }}</td>
            <td>{{ $class->tahun_ajaran }}</td>
            <td>{{ $class->mapel }}</td>
            <td>{{ $class->nama_guru }}</td>
            <td>{{ $class->nama_kelas }}</td>
            <td><a href="{{ route('class_courses.edit',$class->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('class_courses.destroy', $class->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
            </tr>
@endforeach
</tbody>
</table>
{!! $class_courses->links() !!}
</div>
</div>
@endsection
