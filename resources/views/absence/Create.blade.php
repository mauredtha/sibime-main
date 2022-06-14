@extends('course.Layout')
@section('content')

<div class="panel-heading">
Absensi Kelas {{$class_name[0]->name}} / Tahun Ajaran {{$class_name[0]->tahun_ajaran}}
</div>
<br><br>
<form action="{{ route('absences.store') }}" method="POST" name="add_absences" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
    <div class="col-md-12">
    <input class="form-control " id="data_siswa" name ="data_siswa" type="hidden" value="{{$datas}}" >
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Kode Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Kehadiran</th>
                    <th><input type="checkbox" id="select_all"><b> Pilih Semua</b></th>
                    <th>Alasan</th>
                    <th>Dokumen / Bukti Surat</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $user)
            <?php $i=$loop->index; ?>
            <tr>
            <td><input class="form-control" type="hidden" id="kode_siswa" name="kode_siswa[]" value="{{ $user->kode }}" readonly/>{{ $user->kode }}</td>
            <td>
              <input class="form-control" type="hidden" id="name" name="name[]" value="{{ $user->name }}" readonly/>
              {{ $user->name }}
            </td>
            <td colspan='2' style="text-align:center;">
              <input class="form-control" type="hidden" id="absence" name="status_kehadiran[{{$i}}]" value="off"/>
              <input type="checkbox" id="status_kehadiran" name="status_kehadiran[{{$i}}]" value="on"/>
            </td>
            <td><input type="textarea" id="alasan" name="alasan[]"/></td>
            <td><input type="file" name="doc[{{$i}}]"/></td>
            </tr>
            @endforeach
    </tbody>
    </table>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
    </div>
</form>

@endsection
