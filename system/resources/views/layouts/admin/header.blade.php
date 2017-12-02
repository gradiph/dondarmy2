<nav class="navbar navbar-default">
	<div class="container">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL('admin') }}">Admin DonDar MY</a>
        </div>
        @if(Auth::user())
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav">
            	<li><a href="{{ url('admin') }}">Home</a></li>
                <li><a href="{{ url('admin/donor') }}">Donor</a></li>
                <li><a href="{{ url('admin/kegiatan') }}">Kegiatan</a></li>
                <li><a href="{{ url('admin/proses-donor') }}">Proses Donor</a></li>
                <li><a href="{{ url('admin/user') }}">User</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><span class="glyphicon glyphicon-user"></span> {{ Auth::user() ? Auth::user()->nama : '' }}</a></li>
            	<li><a href="{{ url('login/logout') }}">Keluar</a></li>
            </ul>
        </div>
        @endif
<!--        Tambahan-->
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav">
            	<li><a href="{{ url('admin') }}">Home</a></li>
                <li><a href="{{ url('admin/donor') }}">Donor</a></li>
                <li><a href="{{ url('admin/kegiatan') }}">Kegiatan</a></li>
                <li><a href="{{ url('admin/proses-donor') }}">Proses Donor</a></li>
                <li><a href="{{ url('admin/user') }}">User</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><span class="glyphicon glyphicon-user"></span> {{ Auth::user() ? Auth::user()->nama : '' }}</a></li>
            	<li><a href="{{ url('login/logout') }}">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>
