<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <td>
                No
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/donor/list')}}?field=nama&sort={{Session::get("donor_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Nama
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('donor_field')=='nama'?(Session::get('donor_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/donor/list')}}?field=gol_darah_id&sort={{Session::get("donor_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Gol. Darah
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('donor_field')=='gol_darah_id'?(Session::get('donor_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/donor/list')}}?field=kelamin&sort={{Session::get("donor_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Kelamin
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('donor_field')=='kelamin'?(Session::get('donor_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/donor/list')}}?field=telp&sort={{Session::get("donor_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Telepon
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('donor_field')=='telp'?(Session::get('donor_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/donor/list')}}?field=total_donor&sort={{Session::get("donor_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Total Donor
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('donor_field')=='total_donor'?(Session::get('donor_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/donor/list')}}?field=donor_terakhir&sort={{Session::get("donor_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Donor Terakhir
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('donor_field')=='donor_terakhir'?(Session::get('donor_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>Aksi</td>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($donors as $donor)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="text-left">{{ $donor->nama }}</td>
                    <td>{{ $donor->golDarah->nama }}</td>
                    <td>{{ $donor->kelamin }}</td>
                    <td>{{ $donor->telp }}</td>
                    <td>{{ $donor->total_donor }}</td>
                    <td>{{ $donor->donor_terakhir }}</td>
                    <td>
                        <a href="{{ url('admin/donor/ubah?id='.$donor->id) }}" title="Ubah Data" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        <a href="{{ url('admin/donor/hapus?id='.$donor->id) }}" title="Hapus Data" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        Total Data : {{ $total }}
        <div class="pull-right">{!! str_replace('/?','?',$donors->render()) !!}</div>
    </p>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
