@extends('class_courses.Layout')
@section('content')
<br>
<form action="{{ route('class_courses.update', $data['class_info']->id) }}" method="POST" name="update_class_courses" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <strong>Tahun Ajaran</strong>
              <select class="form-control"  id="tahun_ajaran" name="tahun_ajaran">
                @foreach($list_tahun_ajar as $tahun)
                  <option value="{{$tahun->tahun_ajaran}}" {{ $tahun->tahun_ajaran == $data['class_info']->tahun_ajaran ? 'selected' : '' }}>{{$tahun->tahun_ajaran}}</option>
                @endforeach
              </select>
              @if(!$data['class_info']->tahun_ajaran)
              <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
              @endif
          </div>
      </div>
      <div class="col-md-12">
          <div class="form-group">
              <strong>Level</strong>
              <?php $level = array('X'=>'X','XI'=>'XI','XII'=>'XII'); ?>
              <select name="level" class="form-control">
                <?php foreach ($level as $key=>$val) { ?>
                  <option value="{{$key}}" {{ $key == $data['class_info']->level ? 'selected' : '' }}>{{$val}}</option>
                <?php } ?>
              </select>
              @if(!$data['class_info']->level)
              <span class="text-danger">{{ $errors->first('level') }}</span>
              @endif
          </div>
      </div>
      <div class="col-md-12">
          <div class="form-group">
              <strong>Mapel</strong>
              <select class="form-control" name="mapel" id="mapel">
                @foreach($list_mapel as $mapel)
                  <option value="{{$mapel->name}}" {{ $mapel->name == $data['class_info']->mapel ? 'selected' : '' }}>{{$mapel->name}}</option>
                @endforeach
              </select>
              @if(!$data['class_info']->mapel)
              <span class="text-danger">{{ $errors->first('mapel') }}</span>
              @endif
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Guru</strong>
              <select class="form-control" name="guru" id="guru">
                @foreach($list_guru as $guru)
                  <option value="{{$guru->kode}}" {{ $guru->kode == $data['class_info']->guru ? 'selected' : '' }}>{{$guru->name}}</option>
                @endforeach
              </select>
              @if(!$data['class_info']->guru)
              <span class="text-danger">{{ $errors->first('guru') }}</span>
              @endif
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Kelas</strong>
              <select class="form-control" multiple="multiple" name="kelas[]" id="kelas">

                <?php foreach ($list_kelas as $k => $kelas) {
                  $selected = (in_array($kelas->name,$data['class_info']->kelas) ? 'selected="selected"' : '');
                ?>
                  <option value="{{$kelas->name}}" {{$selected}}>{{$kelas->name}}</option>
                <?php }?>

              </select>
              @if(!$data['class_info']->kelas)
              <span class="text-danger">{{ $errors->first('kelas') }}</span>
              @endif
          </div>
      </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
