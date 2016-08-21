@extends('layouts.admin.app')
@section('title') Hapus User | @stop
@section('content')

<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hapus User
                </div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('user/hapus'),'method'=>'post','id'=>'frmUser','class'=>'form-horizontal']) }}
                        {{ Form::hidden('id',$user->id) }}
                        @if(count($errors) > 0)
                            <div id='error' class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p><strong>{{ $error }}</strong></p>
                                @endforeach
                                <p><i>Klik untuk menutup</i></p>
                            </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('nama','* Nama',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('nama',$user->nama,['class'=>'form-control','placeholder'=>'Masukkan No. Register','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('username','* Username',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('username',$user->username,['class'=>'form-control','placeholder'=>'Masukkan Nama','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('role','* Role',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('role',['Panitia'=>'Panitia','Admin'=>'Admin','SuperAdmin'=>'Super Admin'],old('role'),['class'=>'form-control','required','readonly']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-2">
                                {{ Form::submit('Hapus',['class'=>'btn btn-primary btn-block']) }}
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url('user') }}" class="btn btn-info btn-block">Batal</a>
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
