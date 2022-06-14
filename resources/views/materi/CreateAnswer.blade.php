@extends('materi.View')
@section('content')
<br>
<form action="{{ route('answers') }}" method="POST" name="add_answer" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Materi</strong>
                <input type="hidden" name="materi_id" class="form-control" placeholder="" value="{{$id}}">
                <input type="text" name="materi" class="form-control" placeholder="" value="{{$subjects}}">
                <span class="text-danger">{{ $errors->first('materi') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <?php $kategori = array('Tugas','Ulangan Harian','Remedial'); ?>
                <select name="kategori" id="kategori" class="form-control">
                    @foreach($kategori as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>File Tugas / Ujian / Remedial</strong>
                <input type="file" name="answer" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('answer') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
