@extends('layouts.admin.app')
@section('title') Ubah User | @stop
@section('content')

<meta name="_token" content="{!! csrf_token() !!}" />
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah User
                </div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('admin/user/ubah'),'method'=>'post','id'=>'frmUser','class'=>'form-horizontal']) }}
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
                                {{ Form::text('nama',$user->nama,['class'=>'form-control','placeholder'=>'Masukkan nama user ...','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('username','* Username',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('username',$user->username,['class'=>'form-control','placeholder'=>'Masukkan Username ...','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password','Password',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::password('password',['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('role','* Role',['class'=>'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::select('role',['Panitia'=>'Panitia','Admin'=>'Admin','SuperAdmin'=>'Super Admin'],$user->role,['class'=>'form-control','required']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-2">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary btn-block','id'=>'btnSimpan']) }}
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ url('admin/user') }}" class="btn btn-info btn-block">Batal</a>
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
