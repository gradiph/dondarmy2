<nav class="navbar navbar-default">
	<div class="container">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL('/') }}">DonDar MY</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav">
            	<li><a href="{{ URL('/') }}">Home</a></li>
                <li><a href="{{ URL('donor') }}">Donor</a></li>
                <li><a href="{{ URL('kegiatan') }}">Kegiatan</a></li>
                <li><a href="{{ URL('proses-donor') }}">Proses Donor</a></li>
                <li><a href="{{ URL('user') }}">User</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><span class="glyphicon glyphicon-user"></span> {{ Auth::user() ? Auth::user()->nama : '' }}</a></li>
            	<li><a href="{{ URL('logout') }}">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>
