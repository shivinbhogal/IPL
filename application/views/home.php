<html>
  <head>
    <title>IPL HOME PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>" />
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>" />
  </head>
  <body>
    <!-- NAVBAR   -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <a href="#" class="navbar-brand">IPL</a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="/home">Home</a>
            </li>
            <li>
              <a href="/auction">Auctions</a>
            </li>
            <li>
              <a href="/venues">Venues</a>
            </li>
            <li>
              <a href="/teams">Teams</a>
            </li>
            <li>
              <a href="/fixtures">Fixtures</a>
            </li>
            <li>
              <a href="/awards">Awards</a>
            </li>
            <li>
              <a href="/login">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Carousel
    ================================================== -->
    <div class="container">
      <div id="this-carousel-id" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active">
            <a href="http://hubblesite.org/gallery/album/entire/pr2006046a/xlarge_web/npp/128/">  <img src="<?php echo site_url('media/img/team1.jpg')?>" alt="Antennae Galaxies" />
            </a>
          </div>
          <div class="item">
            <a href="http://hubblesite.org/gallery/album/entire/pr2007016e/xlarge_web/npp/128/">
              <img src="<?php echo site_url('media/img/team2.jpg')?>" alt="Carina Caterpillar" />
            </a>
          </div>
          <div class="item">
            <a href="http://hubblesite.org/gallery/album/entire/pr2003010i/npp/128/">
              <img src="<?php echo site_url('media/img/team3.jpg')?>" alt="Light Echo" />
            </a>
          </div>
        </div><!-- .carousel-inner -->
        <!--  next and previous controls here
              href values must reference the id for this carousel -->
          <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
      </div><!-- .carousel -->
      <!-- end carousel -->
      <hr>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-3">
          <h3>News</h3>
          <p>Get the latest news and annoucements of the IPL. View announcements of your favorite teams and players and stay updated. </p>
          <a href="http://www.iplt20.com/news" class="btn btn-default">Enter</a>
        </div>
        <div class="col-sm-3">
          <h3>Teams</h3>
          <p>View all the participating teams of this tournament. Know owners, coaches, captains etc of all the teams.</p>
          <a href="<?php echo site_url('teams')?>" class="btn btn-default">Enter</a>
        </div>
        <div class="col-sm-3">
          <h3>Awards</h3>
          <p>View all the winner of the awards of the tournament like purple cap, orange cap, height run scorer/wicket taker etc. </p>
          <a href="<?php echo site_url('awards')?>" class="btn btn-default">Enter</a>
        </div>
        <div class="col-sm-3">
          <h3>Matches</h3>
          <p>Get the latest match details of the tournament. View the latest updates of the results and stats.</p>
          <a href="<?php echo site_url('fixtures')?>" class="btn btn-default">Enter</a>
        </div>
      </div>

    </div> <!-- /container -->

    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script></div>
  </body>
</html>