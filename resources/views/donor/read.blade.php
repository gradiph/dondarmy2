@extends('layouts.admin.app')
@section('title') List Donor | @stop
@section('content')

<div class="container">
    <h2>
        List Donor
        <div class="pull-right">
            <button id="btnTambah" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
        </div>
    </h2>
    <hr>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="labelModalTambah" aria-hidden="true" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="labelModalTambah">Tambah Data</h4>
            </div>
            <div class="modal-body">
<!--                <form id="frmDonor" name="frmDonor" class="form-horizontal" novalidate="">-->
                {{ Form::open(['method'=>'POST','id'=>'frmDonor','class'=>'form-horizontal','novalidate'=>""]) }}
                    <div class="form-group">
                        {{ Form::label('no_register','No. Register',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('no_register',old('no_register'),['class'=>'form-control','placeholder'=>'Masukkan No. Register']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nama','Nama',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('nama',old('nama'),['class'=>'form-control','placeholder'=>'Masukkan Nama']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="selectGolDarah"></div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kelamin','Jenis Kelamin',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            <label class="radio-inline">{{ Form::radio('kelamin','Pria',false) }} Pria</label>
                            <label class="radio-inline">{{ Form::radio('kelamin','Wanita',false) }} Wanita</label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tempat_lahir','Tempat, Tanggal Lahir',['class'=>'col-sm-4 col-xs-12 control-label']) }}
                        <div class="col-sm-4 col-xs-6">
                            {{ Form::text('tempat_lahir',old('tempat_lahir'),['class'=>'form-control','placeholder'=>'Masukkan Kota Lahir']) }}
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            {{ Form::text('tgl_lahir',old('tgl_lahir'),['id'=>'tgl_lahir','class'=>'form-control','placeholder'=>'Klik Pilih Tanggal']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telp','Telepon',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('telp',old('telp'),['class'=>'form-control','placeholder'=>'Masukkan No. Telepon']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('alamat','Alamat',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('alamat',old('alamat'),['class'=>'form-control','placeholder'=>'Masukkan Alamat']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('rt','RT / RW',['class'=>'col-sm-4 col-xs-12 control-label']) }}
                        <div class="col-sm-3 col-xs-6">
                            {{ Form::text('rt',old('rt'),['class'=>'form-control','placeholder'=>'Masukkan RT']) }}
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            {{ Form::text('rw',old('rw'),['id'=>'rw','class'=>'form-control','placeholder'=>'Masukkan RW']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kelurahan','Kelurahan',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('kelurahan',old('kelurahan'),['class'=>'form-control','placeholder'=>'Masukkan Kelurahan']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kecamatan','Kecamatan',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('kecamatan',old('kecamatan'),['class'=>'form-control','placeholder'=>'Masukkan Kecamatan']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kode_pos','Kode Pos',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('kode_pos',old('kode_pos'),['class'=>'form-control','placeholder'=>'Masukkan Kode Pos']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="selectPekerjaan"></div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('penghargaan','Penghargaan',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('penghargaan',old('penghargaan'),['class'=>'form-control','placeholder'=>'Masukkan Penghargaan']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('total_donor','Total Donor',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('total_donor',old('total_donor'),['class'=>'form-control','placeholder'=>'Masukkan Total Donor']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('donor_terakhir','Donor Terakhir',['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('donor_terakhir',old('donor_terakhir'),['class'=>'form-control','placeholder'=>'Klik Pilih Tanggal']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            {{ Form::button('Simpan',['class'=>'btn btn-primary btn-block','id'=>'btnSimpan']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />

<script>
$(document).ready(function(){
    ajaxLoad("{{ url('donor/list') }}",'data');

    $("#btnTambah").click(function(){
        ajaxLoad("{{ url('golDarah/listSelect') }}",'selectGolDarah');
        ajaxLoad("{{ url('pekerjaan/listSelect') }}",'selectPekerjaan');
        $("#frmDonor").trigger('reset');
        $("#modalTambah").modal("show");

        $("#tgl_lahir").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showAnim: "drop",
            showOptions: {direction: "up"}
        });
        $("#donor_terakhir").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showAnim: "drop",
            showOptions: {direction: "up"}
        });

        $("#btnSimpan").click(function(e){
            var formdata = {
                no_register: $("#no_register").val(),
                nama: $("#nama").val(),
                gol_darah_id: $("#gol_darah_id").val(),
                kelamin: $("#kelamin").val(),
                tempat_lahir: $("#tempat_lahir").val(),
                tgl_lahir: $("#tgl_lahir").val(),
                telp: $("#telp").val(),
                alamat: $("#alamat").val(),
                rt: $("#rt").val(),
                rw: $("#rw").val(),
                kelurahan: $("#kelurahan").val(),
                kecamatan: $("#kecamatan").val(),
                kode_pos: $("#kode_pos").val(),
                pekerjaan_id: $("#pekerjaan_id").val(),
                penghargaan: $("#penghargaan").val(),
                total_donor: $("#total_donor").val(),
                donor_terakhir: $("#donor_terakhir").val()
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr();
                }
            });

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ url('donor/tambah') }}",
                data: formdata,
                dataType: "json",
                success: function(data){
                    $("#modalTambah").hide();
                    ajaxLoad("{{ url('donor/list') }}",'data');
                },
                error: function(data){
                    console.log("Error: "+data);
                }
            });
        });
    });
});
</script>

@stop
