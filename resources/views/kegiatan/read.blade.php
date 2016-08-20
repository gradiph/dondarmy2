@extends('layouts.admin.app')
@section('title') List Kegiatan | @stop
@section('content')

<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            <p><strong>{{ Session::get('message') }}</strong></p>
            <p><i>Klik untuk menutup</i></p>
        </div>
    @endif
    <h2>
        List Kegiatan
        <div class="pull-right">
            <a href="{{ url('kegiatan/tambah') }}" id="btnTambah" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
        </div>
    </h2>
    <hr>
    <div class="row">
        <div class="col-lg-4 form-group">
            <div class="input-group">
                <input class="form-control" id="search" value="{{ Session::get('kegiatan_search') }}"
                       onkeyup="if ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 13 || event.keyCode == 8 || event.keyCode == 46) ajaxLoad('{{url('kegiatan/list')}}?ok=1&search='+this.value,'data')"
                       placeholder="Cari Nama ..."
                       type="text"
                       autofocus>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default"
                            onclick="ajaxLoad('{{url('kegiatan/list')}}?ok=1&search='+$('#search').val())"><i
                                class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="data"></div>
    <hr>
</div>

<script>
$(document).ready(function(){
    ajaxLoad("{{ url('kegiatan/list') }}",'data');
    $(".alert").click(function(){
        $(this).hide('slow');
    });
});
</script>

@stop
