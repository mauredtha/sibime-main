@extends('workbook.Layout')
@section('content')
<br>
<form action="{{ route('workbooks.update', $workbook_info->id) }}" method="POST" name="update_workbook" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <select class="form-control" name="kategori" id="kategori">
                  <?php $kategori = array('Buku Kerja I', 'Buku Kerja II', 'Buku Kerja III', 'Buku Kerja IV');
                  foreach ($kategori as $key => $value) { ?>
                    <option value="{{$value}}" {{ $value == $workbook_info->kategori ? 'selected' : '' }}>{{$value}}</option>
                  <?php } ?>
                </select>
                @if(!$workbook_info->kategori)
                <span class="text-danger">{{ $errors->first('kategori') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <select class="form-control" name="name" id="name">
                  <option value="">-- Pilih Nama Buku Kerja -- </option>
                </select>
                @if(!$workbook_info->name)
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Description" value="{{ $workbook_info->tahun_ajaran }}"></textarea>
                @if(!$workbook_info->tahun_ajaran)
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>File</strong>
                @if($workbook_info->file)
                <a href="{{ Storage::url('uploads/'.$workbook_info->file) }}" target="_blank"></a>
                @endif
                <input type="file" name="file" class="form-control" placeholder="" value="{{ $workbook_info->file }}">
                <!-- <span class="text-danger">{{ $errors->first('file') }}</span> -->
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  var kategori = $('#kategori').val();
  if(kategori == 'Buku Kerja I'){
    $("#name").html("<option value='KKM'>KKM</option><option value='RPP'>RPP</option><option value='Silabus'>Silabus</option><option value='Kompetensi Dasar (KD)'>Kompetensi Dasar (KD)</option><option value='Kompetensi Inti (KI)'>Kompetensi Inti (KI)</option><option value='Standar Kompetensi Lulusan (SKL)'>Standar Kompetensi Lulusan (SKL)</option>");
  }

  $("#kategori").change(function () {

      var val = $(this).val();
      if (val == "Buku Kerja I") {
          $("#name").html("<option value='KKM'>KKM</option><option value='RPP'>RPP</option><option value='Silabus'>Silabus</option><option value='Kompetensi Dasar (KD)'>Kompetensi Dasar (KD)</option><option value='Kompetensi Inti (KI)'>Kompetensi Inti (KI)</option><option value='Standar Kompetensi Lulusan (SKL)'>Standar Kompetensi Lulusan (SKL)</option>");
      } else if (val == "Buku Kerja II") {
          $("#name").html("<option value='Jurnal Agenda Guru'>Jurnal Agenda Guru</option><option value='Program Semester'>Program Semester</option><option value='Program Tahunan'>Program Tahunan</option><option value='Alokasi Waktu'>Alokasi Waktu</option><option value='Kalender Pendidikan'>Kalender Pendidikan</option><option value='Pembiasaan Guru'>Pembiasaan Guru</option><option value='Tata Tertib Guru'>Tata Tertib Guru</option><option value='Ikrar Guru'>Ikrar Guru</option><option value='Kode Etik Guru'>Kode Etik Guru</option>");
      } else if (val == "Buku Kerja III") {
          $("#name").html("<option value='Kumpulan Soal'>Kumpulan Soal</option><option value='Kumpulan Soa dan Kisi-Kisi Soal'>Kumpulan Soa dan Kisi-Kisi Soal</option><option value='Daya Serap Siswa'>Daya Serap Siswa</option><option value='Jadwal Mengajar'>Jadwal Mengajar</option><option value='Daftar Buku Pegawai / Siswa'>Daftar Buku Pegawai / Siswa</option><option value='Analisis Hasil Ulangan dan Program Perbaikan/Pengayaan'>Analisis Hasil Ulangan dan Program Perbaikan/Pengayaan</option><option value='Penilaian Akhlak/Kepribadian Siswa'>Penilaian Akhlak/Kepribadian Siswa</option><option value='Daftar Nilai'>Daftar Nilai</option><option value='Daftar Hadir'>Daftar Hadir</option>");
      } else if (val == "Buku Kerja IV") {
          $("#name").html("<option value='Program Tindak Lanjut Kerja PAK Guru'>Program Tindak Lanjut Kerja PAK Guru</option><option value='Daftar Evaluasi Diri Kerja Guru'>Daftar Evaluasi Diri Kerja Guru</option>");
      } else {
        $("#name").html("<option value=''>--select one--</option>");
      }
  });
});
</script>
@endsection
