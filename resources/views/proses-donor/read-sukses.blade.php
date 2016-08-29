@extends('layouts.admin.app')
@section('title') Proses Donor | @stop
@section('content')

<?php
$kegiatan = [];
$kegiatan += ['0' => 'Pilih Kegiatan ...'];
foreach ($kegiatans as $data)
{
    $kegiatan += [$data->id => $data->tgl];
}
?>
<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            <p><strong>{{ Session::get('message') }}</strong></p>
            <p><i>Klik untuk menutup</i></p>
        </div>
    @endif
    <h2>
        Proses Donor <span id="tgl"></span>
    </h2>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4" style="line-height:33px; letter-spacing:1px; text-align:right;">Tanggal Kegiatan</div>
                <div class="col-lg-4 form-group">
                    {{ Form::select(
                        'proses_kegiatan',
                        $kegiatan,
                        Session::get('proses_kegiatan'),
                        [
                            'class' => 'form-control',
                            'id' => 'proses_kegiatan'
                        ]
                    ) }}
                </div>
<!--
                <div class="col-lg-1">
                    <button id="btnRefresh" class="btn btn-danger">Refresh List</button>
                </div>
-->
            </div>
            <div class="col-lg-12" id="antrian"></div>
        </div>
        <div class="col-lg-6 form-group">
            <div class="col-lg-8 form-group">
                <div class="input-group">
                    <input class="form-control" id="search" value="{{ Session::get('proses_search') }}"
                           onkeyup="if ((event.keyCode >= 48 && event.keyCode <= 90) || event.keyCode == 13 || event.keyCode == 8 || event.keyCode == 46) ajaxLoad('{{url('proses-donor/listdonor')}}?ok=1&search='+this.value,'donor')"
                           placeholder="Cari Nama ..."
                           type="text"
                           autofocus>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default"
                                onclick="ajaxLoad('{{url('proses-donor/listdonor')}}?ok=1&search='+$('#search').val(),'donor')"><i
                                    class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <a href="{{ url('proses-donor/tambahdonor') }}" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-plus"></i> Tambah Donor</a>
            </div>
            <div class="col-lg-12" id="donor"></div>
        </div>
    </div>
    <div class="row">
    </div>
    <hr>
</div>

<script>
$(document).ready(function(){
    ajaxLoad("{{ url('proses-donor/listdonor') }}",'donor');
    ajaxLoad("{{ url('proses-donor/listantrian') }}",'antrian');
    $(".alert").click(function(){
        $(this).hide('slow');
    });
    $("#proses_kegiatan").change(function(){
        ajaxLoad("{{ url('proses-donor/listantrian?id=') }}" + $(this).val(),'antrian');
    });
    var donor_id = "{{ $id }}";
    var win = window.open('{{ url('proses-donor/print?donor_id=') }}' + donor_id, '_blank');
    if (win) {
        //Browser has allowed it to be opened
        win.focus();
        $.ajax({
            method: "GET",
            url: "{{ url('proses-donor/pilih') }}",
            cache: false,
            data: {
                donor_id: donor_id
            }
        })
        .done(function(){
            ajaxLoad("{{ url('proses-donor/listdonor') }}",'donor');
            ajaxLoad("{{ url('proses-donor/listantrian') }}",'antrian');
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
</script>

@stop
