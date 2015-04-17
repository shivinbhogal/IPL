<!DOCTYPE html>
<html>
  <head>
    <title>Finished All</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>" />
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>" />
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){


      });
    </script>
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

  <!--   =========-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="panel-header">
                <h1 class="text-success">Thank You !!</h1>
              </div>

              <div class="page-body">
                All the data is successfully stored into the database. Please goto the user view now.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>
