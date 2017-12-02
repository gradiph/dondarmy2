<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>@yield('title')Donor Darah GKI Maulana Yusuf Bandung</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .hero-images {
                width: 100%;
                min-height: 650px;
                z-index: 2;
                opacity: 1;
            }
            #map {
                width: 100%;
                height: 400px;
            }
        </style>
        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCEw-sfx7EwTiQK5FVb_bXoWFssQlIuf1w&callback=initMap" async defer type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div id="progress-bar"></div>
            <img src="../images/poster20161127.jpg" class="hero-images" alt="poster.jpg" />
        </header>
        <div id="waktu" class="container-fluid text-center bg-danger">
            <p></p>
            <div class="col-lg-offset-4 col-lg-4">
                <img src="../images/calendar-flat.png" class="img-responsive" width="170" align="center">
                <h1><strong>27 November 2016</strong></h1>
            </div>
            <p></p>
            <div class="col-lg-offset-4 col-lg-4">
                <img src="../images/clock-icon.png" class="img-responsive" width="170" align="center">
                <h2><strong>08.00 - 12.00 WIB</strong></h2>
            </div>
            <p></p>
        </div>
        <div id="tempat" class="container-fluid text-center bg-success">
            <br>
            <div class="col-lg-offset-4 col-lg-4">
                <img src="../images/place-icon.png" class="img-responsive" width="170" align="center">
                <h2><strong>GKI Jalan Maulana Yusuf No. 20 Bandung</strong></h2>
            </div>
            <div id="map"></div>
            <p></p>
        </div>
        <div id="kontak" class="container-fluid text-center bg-primary">
            <h3>Narahubung:</h3>
            <h2>
                <strong>Euis</strong> <br>
                <span class="glyphicon glyphicon-call"></span> 085248848819
            </h2>
        </div>
        <footer>
            <div class="container-fluid text-center" style="background: rgb(55,55,55); color: white;">
                <h4>&copy; 2016</h4>
            </div>
        </footer>
    </body>
    <script>
        function progressBar() {
            var h = new Date(2016,10,24,23,59,59,0);
            var n = new Date();
            var length = n.getDate() / h.getDate() * 100 ;
            document.getElementById("progress-bar").innerHTML =
                "<div class='progress progress-striped active'>" +
                "<div class='progress-bar progress-bar-danger' role='progressbar' style='width: " + length.toFixed(2) + ";'>" +
                    length.toFixed(2) + "%" +
                "</div>" +
                "</div>";
            var t = setTimeout(progressBar, 500);
        }
        function initMap() {
            var uluru = {lat: -6.900758, lng: 107.613755};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
    </script>
</html>
