@extends('layouts.admin.app')
@section('title') Tambah Donor | @stop
@section('content')

<?php
$golDarah = [];
foreach($golDarahs as $data)
{
    $golDarah += [$data->id => $data->nama];
}
$pekerjaan = [];
foreach($pekerjaans as $data)
{
    $pekerjaan += [$data->id => $data->nama];
}
?>
<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Donor Baru
                </div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('admin/proses-donor/tambahdonor'),'method'=>'post','id'=>'frmDonor','class'=>'form-horizontal']) }}
                        @if(count($errors) > 0)
                            <div id='error' class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p><strong>{{ $error }}</strong></p>
                                @endforeach
                                <p><i>Klik untuk menutup</i></p>
                            </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('no_register','* No. Register',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('no_register',old('no_register'),['class'=>'form-control','placeholder'=>'Masukkan No. Register','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nama','* Nama',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('nama',old('nama'),['class'=>'form-control','placeholder'=>'Masukkan Nama','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('gol_darah_id','* Gol. Darah',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('gol_darah_id',$golDarah,old('gol_darah_id'),['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('kelamin','* Jenis Kelamin',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                <label class="radio-inline">{{ Form::radio('kelamin','Pria',true) }} Pria</label>
                                <label class="radio-inline">{{ Form::radio('kelamin','Wanita',false) }} Wanita</label>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tempat_lahir','* Tempat, Tanggal Lahir',['class'=>'col-sm-4 col-xs-12 control-label']) }}
                            <div class="col-sm-5 col-xs-6">
                                {{ Form::text('tempat_lahir',old('tempat_lahir'),['class'=>'form-control','placeholder'=>'Masukkan Kota Lahir','required']) }}
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                {{ Form::date('tgl_lahir',old('tgl_lahir'),['id'=>'tgl_lahir','class'=>'form-control','placeholder'=>'Klik Pilih Tanggal','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('telp','* Telepon',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('telp',old('telp'),['class'=>'form-control','placeholder'=>'Masukkan No. Telepon','required']) }}
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
                                {{ Form::number('rt',old('rt'),['class'=>'form-control','placeholder'=>'Masukkan RT']) }}
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                {{ Form::number('rw',old('rw'),['id'=>'rw','class'=>'form-control','placeholder'=>'Masukkan RW']) }}
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
                            <div class="col-sm-4">
                                {{ Form::number('kode_pos',old('kode_pos'),['class'=>'form-control','placeholder'=>'Masukkan Kode Pos']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pekerjaan_id','* Pekerjaan',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('pekerjaan_id',$pekerjaan,old('pekerjaan_id'),['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('penghargaan','Penghargaan',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('penghargaan',['10'=>'10x','25'=>'25x','50'=>'50x','75'=>'75x','100'=>'100x'],old('penghargaan'),['class'=>'form-control','placeholder'=>'Masukkan Penghargaan']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('total_donor','Total Donor',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('total_donor',old('total_donor'),['class'=>'form-control','placeholder'=>'Masukkan Total Donor']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('donor_terakhir','Donor Terakhir',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::date('donor_terakhir',old('donor_terakhir'),['class'=>'form-control','placeholder'=>'Klik Pilih Tanggal']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-2">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary btn-block','id'=>'btnSimpan']) }}
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url('admin/proses-donor') }}" class="btn btn-info btn-block">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#error").click(function(){
            $(this).hide('slow');
        });
    });
</script>

@stop
