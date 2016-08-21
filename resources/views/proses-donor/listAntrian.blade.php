<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <td>#</td>
            <td>Nama</td>
            <td>Gol. Darah</td>
            <td>Panggil</td>
            <td>Terima</td>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach($details as $detail)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="text-left">{{ $detail->donor->nama }}</td>
                    <td>{{ $detail->donor->golDarah->nama }}</td>
                    <td><a href="#">{{ $detail->panggil }}</a></td>
                    <td><a href="#">{{ $detail->terima }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
