@extends('class_courses.Layout')
@section('content')
<form action="{{ route('class_courses.store') }}" method="POST" name="add_class_courses">
{{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <select class="form-control"  id="tahun_ajaran" name="tahun_ajaran">
                  @foreach($list_tahun_ajar as $tahun)
                    <option value="{{$tahun->tahun_ajaran}}">{{$tahun->tahun_ajaran}}</option>
                  @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Level</strong>
                <?php $level = array('X'=>'X','XI'=>'XI','XII'=>'XII'); ?>
                <select name="level" class="form-control">
                  <?php foreach ($level as $key=>$val) { ?>
                    <option value="{{$key}}">{{$val}}</option>
                  <?php } ?>
                </select>
                <span class="text-danger">{{ $errors->first('level') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Mapel</strong>
                <select class="form-control" name="mapel" id="mapel">
                  @foreach($list_mapel as $mapel)
                    <option value="{{$mapel->name}}">{{$mapel->name}}</option>
                  @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('mapel') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Guru</strong>
                <select class="form-control" name="guru" id="guru">
                  @foreach($list_guru as $guru)
                    <option value="{{$guru->kode}}">{{$guru->name}}</option>
                  @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('guru') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Kelas</strong>
                <select class="form-control" multiple="multiple" name="kelas[]" id="kelas">
                  @foreach($list_kelas as $kelas)
                    <option value="{{$kelas->name}}">{{$kelas->name}}</option>
                  @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('kelas') }}</span>
            </div>
        </div>



        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
