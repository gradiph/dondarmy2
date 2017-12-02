@extends('layouts.admin.app')
@section('title') Tambah Kegiatan | @stop
@section('content')

<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Kegiatan Baru
                </div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('admin/kegiatan/tambah'),'method'=>'post','id'=>'frmKegiatan','class'=>'form-horizontal']) }}
                        @if(count($errors) > 0)
                            <div id='error' class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p><strong>{{ $error }}</strong></p>
                                @endforeach
                                <p><i>Klik untuk menutup</i></p>
                            </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('tgl','* Tanggal',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::date('tgl',old('tgl'),['class'=>'form-control','placeholder'=>'Klik untuk pilih tanggal','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tempat','* Tempat',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('tempat',old('tempat'),['class'=>'form-control','placeholder'=>'Masukkan Tempat Kegiatan','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('target_labu','* Target Labu',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('target_labu',old('target_labu'),['class'=>'form-control','placeholder'=>'Masukkan jumlah target labu','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('hasil_labu','* Hasil Labu',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::number('hasil_labu',old('hasil_labu'),['class'=>'form-control','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-2">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary btn-block','id'=>'btnSimpan']) }}
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url('admin/kegiatan') }}" class="btn btn-info btn-block">Batal</a>
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
