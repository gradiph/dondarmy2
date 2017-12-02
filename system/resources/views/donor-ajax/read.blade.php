@extends('layouts.admin.app')
@section('title') List Donor | @stop
@section('content')

<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    <h2>
        List Donor
        <div class="pull-right">
            <button id="btnTambah" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
        </div>
    </h2>
    <hr>
    <div id="new"></div>
    <div class="row">
        <div class="col-lg-4 form-group">
            <div class="input-group">
                <input class="form-control" id="search" value="{{ Session::get('donor_search') }}"
                       onkeyup="if ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 13 || event.keyCode == 8 || event.keyCode == 46) ajaxLoad('{{url('donor/list')}}?ok=1&search='+this.value,'data')"
                       placeholder="Cari Nama ..."
                       type="text"
                       autofocus>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default"
                            onclick="ajaxLoad('{{url('donor/list')}}?ok=1&search='+$('#search').val())"><i
                                class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 form-group">
            <div class="input-group">
                <select class="form-control" id="search-gol" onchange="ajaxLoad('{{url('donor/list')}}?ok-gol=1&search-gol='+this.value,'data')">
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
                </select>
            </div>
        </div>
    </div>
    <div id="data"></div>
    <hr>
</div>

<script>
$(document).ready(function(){
    ajaxLoad("{{ url('donor/list') }}",'data');
    $("#new").hide();

    $("#btnTambah").click(function(){
        ajaxLoad("{{ url('donor/tambah') }}",'new');
        $("#new").fadeIn('slow');
        $("html, body").animate({
            scrollTop: $("#new").offset().top
        }, 800);
    });
});
</script>

@stop
