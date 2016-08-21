<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <tbody>
            @foreach($donors as $donor)
                <tr>
                    <td class="text-left">{{ $donor->nama }}</td>
                    <td>{{ $donor->golDarah->nama }}</td>
                    <td>{{ $donor->tgl_lahir }}</td>
                    <td>
                        <a href="{{ url('proses-donor/ubah?id='.$donor->id) }}" title="Ubah Data" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ url('proses-donor/hapus?id='.$donor->id) }}" title="Hapus Data" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
