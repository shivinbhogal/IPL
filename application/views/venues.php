<html>
  <head>
    <title>Venues Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/style.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
  </head>
  <body>
    <!--navbar
    ===========-->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <a href="/" class="navbar-brand">IPL</a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/dashboard">Dashboard</a>
            </li>
            <li>
              <a href="/home">Home</a>
            </li>
            <li>
              <a href="/logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1>Venues Details</h1>
          <h4>Upload a CSV (Comma Separated Values) file containg details of all the venues of the tournament.</h4>
        </div>
      </div>
    </div>

    <!--== jumbotron  -->
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="jumbotron">
            <h2>Sample File : venues.csv</h2>
              <p><b>Name,Location,Capcity</b><br>
                    Dubai international cricket stadium,Dubai (UAE),25000<br>
                    Sheikh Zayed Cricket Stadium,Abu Dhabi (UAE),20000<br>
                    Feroz Shah Kotla Stadium,Delhi (IND),48000<br>
              </p>
          </div>
        </div>
      </div>
      <?php echo form_open_multipart('/admin/do_upload');?>
        <span class="btn btn-default btn-file">
          Browse <input type="file" name="userfile">
        </span>
        &nbsp;&nbsp;
        <input type="submit" class="btn btn-primary" value="Next">
        &nbsp;&nbsp;
        <a href="/admin/teams" class="btn btn-primary">Skip &raquo;</a>
      </form>
    </div>
    <!--=======-->

  <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>