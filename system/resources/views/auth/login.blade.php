<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login | Admin Donor Darah GKI Maulana Yusuf Bandung</title>
    {{ Html::style(asset('css/bootstrap.min.css')) }}
    {{ Html::style(asset('js/jquery-ui-1.12.0.custom/jquery-ui.min.css')) }}
    {{ Html::script(asset('js/jquery-2.2.3.min.js')) }}
    {{ Html::script(asset('js/bootstrap.min.js')) }}
    {{ Html::script(asset('js/jquery-ui-1.12.0.custom/jquery-ui.min.js')) }}
</head>
<body>
	<header>@include('layouts.admin.header')</header>
    <div class="content" style="min-height:525px;">
        <div class="col-lg-offset-4 col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Login
                    @if(Session::has('message'))
                        @if(Session::has('type'))
                            <span class="label {{ Session::get('type') }}">{{ Session::get('message') }}</span>
                        @endif
                    @endif
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('login'),'method'=>'POST','role'=>'form','class'=>'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form::label('username','Username',['class'=>'control-label col-lg-3']) }}
                        <div class="col-lg-9">
                            {{ Form::text('username',old('username'),['class'=>'form-control','autofocus','required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password','Password',['class'=>'control-label col-lg-3']) }}
                        <div class="col-lg-9">
                            {{ Form::password('password',['class'=>'form-control','required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            {{ Form::checkbox('remember') }} Remember Me
                        </div>
                    </div>
                    <div class="col-lg-offset-3 col-lg-4">
                        {{ Form::submit('Login',['class' => 'btn btn-danger']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="bg-warning" style="padding:5px 5px; font-size:small">
            <center>
                Admin Donor Darah GKI Maulana Yusuf Bandung
                <br />
                Version 2.0 | 2016
            </center>
        </div>
    </footer>
</body>
</html>
