@extends('course.View')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">Mata Pelajaran</th>
                  <th style="text-align:center;">KKM</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            @foreach($courses as $course)
            <tr>
              <td>{{$no++}}</td>
              <td>
                  <a href="{{route('mapel_komponen',[$class_id, $course->id])}}">{{ $course->name }}</a>
              </td>
              <td>{{$course->kkm}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>
</div>
@endsection
