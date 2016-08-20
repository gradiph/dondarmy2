@extends('layouts.admin.app')
@section('title') Hapus Donor | @stop
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
                    Hapus Donor
                </div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('donor/hapus'),'method'=>'post','id'=>'frmDonor','class'=>'form-horizontal']) }}
                        {{ Form::hidden('id',$donor->id) }}
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
                                {{ Form::number('no_register',$donor->no_register,['class'=>'form-control','placeholder'=>'Masukkan No. Register','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nama','* Nama',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('nama',$donor->nama,['class'=>'form-control','placeholder'=>'Masukkan Nama','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('gol_darah_id','Gol. Darah',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('gol_darah_id',$golDarah,$donor->gol_darah_id,['class'=>'form-control','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('kelamin','* Jenis Kelamin',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                <label class="radio-inline">{{ ($donor->kelamin == 'Pria') ? Form::radio('kelamin','Pria',true) : Form::radio('kelamin','Pria',false) }} Pria</label>
                                <label class="radio-inline">{{ ($donor->kelamin == 'Wanita') ? Form::radio('kelamin','Wanita',true) : Form::radio('kelamin','Wanita',false) }} Wanita</label>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tempat_lahir','* Tempat, Tanggal Lahir',['class'=>'col-sm-4 col-xs-12 control-label']) }}
                            <div class="col-sm-5 col-xs-6">
                                {{ Form::text('tempat_lahir',$donor->tempat_lahir,['class'=>'form-control','placeholder'=>'Masukkan Kota Lahir','required','readonly']) }}
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                {{ Form::date('tgl_lahir',$donor->tgl_lahir,['id'=>'tgl_lahir','class'=>'form-control','placeholder'=>'Klik Pilih Tanggal','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('telp','* Telepon',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('telp',$donor->telp,['class'=>'form-control','placeholder'=>'Masukkan No. Telepon','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('alamat','Alamat',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('alamat',$donor->alamat,['class'=>'form-control','placeholder'=>'Masukkan Alamat','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('rt','RT / RW',['class'=>'col-sm-4 col-xs-12 control-label']) }}
                            <div class="col-sm-3 col-xs-6">
                                {{ Form::number('rt',$donor->rt,['class'=>'form-control','placeholder'=>'Masukkan RT','readonly']) }}
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                {{ Form::number('rw',$donor->rw,['id'=>'rw','class'=>'form-control','placeholder'=>'Masukkan RW','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('kelurahan','Kelurahan',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('kelurahan',$donor->kelurahan,['class'=>'form-control','placeholder'=>'Masukkan Kelurahan','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('kecamatan','Kecamatan',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('kecamatan',$donor->kecamatan,['class'=>'form-control','placeholder'=>'Masukkan Kecamatan','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('kode_pos','Kode Pos',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-4">
                                {{ Form::number('kode_pos',$donor->kode_pos,['class'=>'form-control','placeholder'=>'Masukkan Kode Pos','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pekerjaan_id','* Pekerjaan',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('pekerjaan_id',$pekerjaan,$donor->pekerjaan_id,['class'=>'form-control','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('penghargaan','Penghargaan',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('penghargaan',['10'=>'10x','25'=>'25x','50'=>'50x','75'=>'75x','100'=>'100x'],$donor->penghargaan,['class'=>'form-control','placeholder'=>'Masukkan Penghargaan','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('total_donor','Total Donor',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('total_donor',$donor->total_donor,['class'=>'form-control','placeholder'=>'Masukkan Total Donor','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('donor_terakhir','Donor Terakhir',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::date('donor_terakhir',$donor->donor_terakhir,['class'=>'form-control','placeholder'=>'Klik Pilih Tanggal','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-2">
                                {{ Form::submit('Hapus',['class'=>'btn btn-primary btn-block']) }}
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url('donor') }}" class="btn btn-info btn-block">Batal</a>
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
        $("#error").click(function(){
            $(this).hide('slow');
        });
    });
</script>

@stop
