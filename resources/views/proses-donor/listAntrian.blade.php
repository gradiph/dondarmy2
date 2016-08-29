<table class="table table-bordered table-striped table-hover text-center">
    <thead>
        <td>#</td>
        <td>Nama</td>
        <td>Gol. Darah</td>
        <td>Panggil</td>
        <td>Terima</td>
    </thead>
    <tbody>
        @foreach($details as $detail)
            <tr>
                <td>{{ $detail->antrian }}</td>
                <td class="text-left">{{ $detail->donor->nama }}</td>
                <td>{{ $detail->donor->golDarah->nama }}</td>
                <td><button id="btnPanggil" onclick="ajaxLoad('{{ url('proses-donor/panggil?detail_id='.$detail->id) }}','antrian')" class="btn btn-xs {{ ($detail->panggil == 'Belum') ? 'btn-warning' : 'btn-info' }}"><i class="glyphicon {{ ($detail->panggil == 'Belum') ? 'glyphicon-bullhorn' : 'glyphicon-ok' }}"></i> {{ $detail->panggil }}</button></td>
                <td><button id="btnTerima" onclick="ajaxLoad('{{ url('proses-donor/terima?detail_id='.$detail->id) }}','antrian')" class="btn btn-xs {{ ($detail->terima == 'Tidak') ? 'btn-warning' : 'btn-info' }}"><i class="glyphicon {{ ($detail->terima == 'Tidak') ? 'glyphicon-remove' : 'glyphicon-ok' }}"></i> {{ $detail->terima }}</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
