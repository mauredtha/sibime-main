@extends('materi.View')
@section('content')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('add_answers', $materi_id) }}" >Add</a>
</span>
<br><br>
<div class="row">
    <div class="col-16">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Materi</th>
                    <th style="text-align:center;">Latihan</th>
                    <th style="text-align:center;">Ulangan Harian</th>
                    <th style="text-align:center;">Remedial</th>
                    <th style="text-align:center;" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($answers as $answer)
            <tr>
                <td>
                    <a href="{{ Storage::url('uploads/'.$answer->materi) }}">{{ $answer->materi }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$answer->latihan) }}">{{ $answer->latihan }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$answer->ulangan_harian) }}">{{ $answer->ulangan_harian }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$answer->remidial) }}">{{ $answer->remidial }}</a>
                </td>
                <td>
                    <a href="{{ route('edit_answers',$answer->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('delete_answers', $answer->id)}}" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>
</div>
@endsection
