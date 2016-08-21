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
        Proses Donor
    </h2>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="input-group">
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
});
</script>

@stop
