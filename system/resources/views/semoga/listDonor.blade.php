<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <tbody>
            @foreach($donors as $donor)
                <tr>
                    <td class="text-left">{{ $donor->nama }}</td>
                    <td>{{ $donor->golDarah->nama }}</td>
                    <td>{{ $donor->tgl_lahir }}</td>
                    <td>
                        <a href="{{ url('semoga/bisa?id='.$donor->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> Pilih</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $("#btnPilih").click(function(){
            $(".loading").show();
            var donor_id = $("#btnPilih").val();
            var win = window.open('{{ url('semoga/print?donor_id=') }}' + donor_id, '_blank');
            if (win) {
                //Browser has allowed it to be opened
                win.focus();
                $.ajax({
                    method: "GET",
                    url: "{{ url('semoga/pilih') }}",
                    cache: false,
                    data: {
                        donor_id: donor_id
                    }
                })
                .done(function(){
                    $(".loading").hide();
                    window.location.href = "{{ url('semoga') }}";
                })
                .fail(function(){
                    alert('Error: "Pilih Donor"');
                });
            }
            else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
        });
    });
</script>
