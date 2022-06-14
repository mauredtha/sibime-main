@extends('users.Layout')
@section('content')
<form action="{{ route('upload') }}" method="POST" name="add_users" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Something it's wrong:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for=""><strong>Pilih File</strong></label>
        <input type="file" name="file" class="form-control" required>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
</form>
@endsection
