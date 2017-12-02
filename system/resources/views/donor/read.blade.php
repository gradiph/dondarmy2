@extends('layouts.admin.app')
@section('title') List Donor | @stop
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
        List Donor
        <div class="pull-right">
            <a href="{{ url('admin/donor/tambah') }}" id="btnTambah" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
        </div>
    </h2>
    <hr>
    <div id="new"></div>
    <div class="row">
        <div class="col-lg-4 form-group">
            <div class="input-group">
                <input class="form-control" id="search" value="{{ Session::get('donor_search') }}"
                       onkeyup="if ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 13 || event.keyCode == 8 || event.keyCode == 46) ajaxLoad('{{url('admin/donor/list')}}?ok=1&search='+this.value,'data')"
                       placeholder="Cari Nama ..."
                       type="text"
                       autofocus>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default"
                            onclick="ajaxLoad('{{url('admin/donor/list')}}?ok=1&search='+$('#search').val(),'data')"><i
                                class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 form-group">
            <div class="input-group">
                <select class="form-control" id="search-gol" onchange="ajaxLoad('{{url('admin/donor/list')}}?ok-gol=1&search-gol='+this.value,'data')">
                    <option value="">Semua Gol. Darah</option>
                    <option value="1">A</option>
                    <option value="2">A+</option>
                    <option value="3">A-</option>
                    <option value="4">AB</option>
                    <option value="5">AB+</option>
                    <option value="6">AB-</option>
                    <option value="7">B</option>
                    <option value="8">B+</option>
                    <option value="9">B-</option>
                    <option value="10">O</option>
                    <option value="11">O+</option>
                    <option value="12">O-</option>
                    <option value="13">-</option>
                </select>
            </div>
        </div>
    </div>
    <div id="data"></div>
    <hr>
</div>

<script>
$(document).ready(function(){
    ajaxLoad("{{ url('admin/donor/list') }}",'data');
    $(".alert").click(function(){
        $(this).hide('slow');
    });
});
</script>

@stop
