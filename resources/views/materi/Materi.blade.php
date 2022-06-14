@extends('materi.View')
@section('content')
@if(Auth::user()->role == 'Guru')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('add_materi_class', $id) }}" >Add</a>
</span>
Kelas {{$class_name[0]->name}} / Tahun Ajaran {{$class_name[0]->tahun_ajaran}}
@endif
<br><br>
<div class="row">
    <div class="col-16">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Materi</th>
                    <th style="text-align:center;">Latihan</th>
                    <th style="text-align:center;">Deadline Latihan</th>
                    <th style="text-align:center;">Ulangan Harian</th>
                    <th style="text-align:center;">Deadline UH</th>
                    <th style="text-align:center;">Remedial</th>
                    <th style="text-align:center;">Deadline Remedial</th>
                </tr>
            </thead>
            <tbody>

            @foreach($data['subjects'] as $subject)
            <tr>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->materi) }}">{{ $subject->materi }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->latihan) }}">{{ $subject->latihan }}</a>
                </td>
                <td>{{ $subject->start_latihan.' s/d '.$subject->deadline_latihan }}</td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->ulangan_harian) }}">{{ $subject->ulangan_harian }}</a>
                </td>
                <td>{{$subject->start_uh.' s/d '.$subject->deadline_uh }}</td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->remidial) }}">{{ $subject->remidial }}</a>
                </td>
                <td>{{ $subject->start_remidi.' s/d '.$subject->deadline_remidi }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>
</div>
@endsection
