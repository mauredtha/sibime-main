@extends('users.Layout')
@section('content')
<br>
<form action="{{ route('users.update', $user_info->id) }}" method="POST" name="update_user" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                @if(!$user_info->password)
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Konfirmasi Password</strong>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Re -Password">
            </div>
        </div>


        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
