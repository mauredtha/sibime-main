@extends('course.Layout')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
    <table class="table table-bordered" id="laravel_crud">
        <thead>
            <tr>
                <th style="text-align:center;">No</th>
                <th style="text-align:center;">Level</th>
                <th style="text-align:center;">Mata Pelajaran</th>
                <th style="text-align:center;">KKM</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($courses as $course)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$course->level}}</td>
            <td>
              @if(Auth::user()->role == 'Kepsek')
                <a href="#">{{ $course->name }}</a>
              @else
                <a href="{{route('komponen',$course->id)}}">{{ $course->name }}</a>
              @endif
            </td>
            <td>{{$course->kkm}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
