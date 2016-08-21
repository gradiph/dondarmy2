<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <td>
                No
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('kegiatan/list?field=tgl&sort={{Session::get("kegiatan_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Tanggal
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('kegiatan_field')=='tgl'?(Session::get('kegiatan_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('kegiatan/list?field=tempat&sort={{Session::get("kegiatan_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Tempat
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('kegiatan_field')=='tempat'?(Session::get('kegiatan_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('kegiatan/list?field=target_labu&sort={{Session::get("kegiatan_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Target Labu
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('kegiatan_field')=='target_labu'?(Session::get('kegiatan_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('kegiatan/list?field=hasil_labu&sort={{Session::get("kegiatan_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Hasil Labu
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('kegiatan_field')=='hasil_labu'?(Session::get('kegiatan_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('kegiatan/list?field=laporan&sort={{Session::get("kegiatan_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Laporan
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('kegiatan_field')=='laporan'?(Session::get('kegiatan_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>Aksi</td>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($kegiatans as $kegiatan)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $kegiatan->tgl }}</td>
                    <td>{{ $kegiatan->tempat }}</td>
                    <td>{{ $kegiatan->target_labu }}</td>
                    <td>{{ $kegiatan->hasil_labu }}</td>
                    <td><a href="#download" onclick="javascript:ajaxLoad('{{ url('kegiatan/downloadlaporan?id='.$kegiatan->id) }}')" class="link">{{ $kegiatan->path_laporan }}</a></td>
                    <td>
                        <a href="{{ url('kegiatan/ubah?id='.$kegiatan->id) }}" title="Ubah Data" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        <a href="{{ url('kegiatan/hapus?id='.$kegiatan->id) }}" title="Hapus Data" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        Total Data : {{ $total }}
        <div class="pull-right">{!! str_replace('/?','?',$kegiatans->render()) !!}</div>
    </p>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
