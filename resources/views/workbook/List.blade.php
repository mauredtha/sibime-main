@extends('workbook.Layout')
@section('content')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('workbooks.create') }}" >Add</a>
</span>
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kategori</th>
                    <th>Name</th>
                    <th>File</th>
                    <th>Tahun Ajaran</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($workbooks as $workbook)
            <tr>
            <td>{{ $workbook->id }}</td>
            <td>{{ $workbook->kategori }}</td>
            <td>{{ $workbook->name }}</td>
            <td>@if($workbook->file)
                <a href="{{ asset('uploads/'.$workbook->file) }}" target="_blank">{{ $workbook->file }}</a>
                @endif
            </td>
            <td>{{ $workbook->tahun_ajaran }}</td>
            <td><a href="{{ route('workbooks.edit',$workbook->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('workbooks.destroy', $workbook->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
            </tr>
@endforeach
</tbody>
</table>
{!! $workbooks->links() !!}
</div>
</div>
@endsection
