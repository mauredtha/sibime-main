@extends('workbook.View')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
              <?php if(!$workbooks->isEmpty()){ ?>
                <tr>
                    <th style="text-align:center;">{{$workbooks[0]->kategori}}</th>
                </tr>
              <?php } else { ?>
                <tr>
                    <th style="text-align:center;">Belum Ada Data, Silakan Input Terlebih Dahulu di Menu Buku Kerja</th>
                </tr>
              <?php } ?>
            </thead>
            <tbody>
            @foreach($workbooks as $workbook)
            <tr>
            <td>
                <a href="{{ asset('uploads/'.$workbook->file) }}" target="_blank">{{ $workbook->name }}</a>

            </td>
            </tr>
@endforeach
</tbody>
</table>

</div>
</div>
@endsection
