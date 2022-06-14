@extends('course.View')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Komponen Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
            <?php for ($i=1; $i <= 5; $i++) { ?>
            <tr>

                <td>

                    <a href="{{ Storage::url('uploads/'.$data['course_info']['file'.$i]) }}" target="_blank">{{ $data['course_info']['komponen'.$i] }}</a>

                </td>


            </tr>
            <?php }?>
            <tr>
                <td>
                    <a href="{{ route('subjects', [$level, $data['course_info']['id']]) }}">
                     Materi Belajar</a>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="table table-bordered" id="guru">
            <thead>
                <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">Nama Guru</th>
                    <th style="text-align:center;">Kode Guru</th>
                </tr>
            </thead>
            <tbody>
            <?php for ($i=1; $i <= 5; $i++) {
                if($i == 1){
                    $nama_guru = $data['course_info']['nama_guru'];
                    $kode_guru = $data['course_info']['kode_guru'];
                }else {
                    $nama_guru = $data['course_info']['nama_guru'.$i];
                    $kode_guru = $data['course_info']['kode_guru'.$i];
                }
            ?>
            <tr>
                <td style="text-align:center">{{$i}}</td>
                <td>
                    <a href="{{ route('list_mapel',[$level, $kode_guru]) }}">{{ $nama_guru }}</a>
                </td>
                <td>{{ $kode_guru }}</td>
            </tr>
            <?php }?>
            </tbody>
        </table>

</div>
</div>
@endsection
