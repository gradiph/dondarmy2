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
                        {{--<a id href="{{ url('admin/proses-donor/pilihweb?donor_id='.$donor->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> Pilih</a>--}}
                        {{--<a href="{{ url('admin/proses-donor?sukses='.$donor->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> Pilih</a>--}}
                        <button class="btn btn-xs btn-primary" onclick="pilih('{{ $donor->id }}')"><i class="glyphicon glyphicon-check"></i> Pilih</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function pilih(donor_id){
        var win = window.open('{{ url('admin/proses-donor/print?donor_id=') }}' + donor_id, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
            $.ajax({
                method: "GET",
                url: "{{ url('admin/proses-donor/pilih') }}",
                cache: false,
                data: {
                    donor_id: donor_id
                }
            })
            .done(function(){
                ajaxLoad("{{ url('admin/proses-donor/listdonor') }}",'donor');
                ajaxLoad("{{ url('admin/proses-donor/listantrian') }}",'antrian');
            })
            .fail(function(){
                alert('Error: "Pilih Donor"');
            });
        }
        else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    }
    {{--$(document).ready(function(){
        $("#btnPilih").click(function(){
            var donor_id = $("#btnPilih").val();
            var win = window.open('{{ url('admin/proses-donor/print?donor_id=') }}' + donor_id, '_blank');
            if (win) {
                //Browser has allowed it to be opened
                win.focus();
                $.ajax({
                    method: "GET",
                    url: "{{ url('admin/proses-donor/pilih') }}",
                    cache: false,
                    data: {
                        donor_id: donor_id
                    }
                })
                .done(function(){
                    ajaxLoad("{{ url('admin/proses-donor/listdonor') }}",'donor');
                    ajaxLoad("{{ url('admin/proses-donor/listantrian') }}",'antrian');
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
    });--}}
</script>
