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
            <a href="{{ url('admin/kegiatan/tambah') }}" id="btnTambah" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
        </div>
    </h2>
    <hr>
    <div id="data"></div>
    <hr>
</div>

<script>
$(document).ready(function(){
    ajaxLoad("{{ url('admin/kegiatan/list') }}",'data');
    $(".alert").click(function(){
        $(this).hide('slow');
    });
});
</script>

@stop
