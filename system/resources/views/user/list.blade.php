<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <td>
                No
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/user/list')}}?field=nama&sort={{Session::get("user_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Nama
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('user_field')=='nama'?(Session::get('user_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/user/list')}}?field=username&sort={{Session::get("user_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Username
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('user_field')=='username'?(Session::get('user_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>
                <a onclick="javascript:ajaxLoad('{{url('admin/user/list')}}?field=role&sort={{Session::get("user_sort")=="asc"?"desc":"asc"}}','data')" href="#">
                    Role
                </a>
                <i style="font-size: 12px"
                   class="glyphicon {{ Session::get('user_field')=='role'?(Session::get('user_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </td>
            <td>Aksi</td>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ url('admin/user/ubah?id='.$user->id) }}" title="Ubah Data" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        <a href="{{ url('admin/user/hapus?id='.$user->id) }}" title="Hapus Data" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        Total Data : {{ $total }}
        <div class="pull-right">{!! str_replace('/?','?',$users->render()) !!}</div>
    </p>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
