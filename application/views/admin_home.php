<html>
  <head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>" />
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>" />
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript">

      $(document).ready(function(){

        $("#flush-data").click(function(){

          var result = confirm("Are you sure you want delete all the data ?");

          if(result)
          {
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('admin/flushall')?>",
              data: "<?php echo $this->security->get_csrf_token_name(); echo "="; echo $this->security->get_csrf_hash()?>",
              success : function(){
                alert("All data successfully flushed");
              }
            });
          }
        });
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
            <li class="active">
              <a href="#">Dashboard</a>
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

    <!--jumbotron
    ===============-->
    <div class="container">
      <div class="jumbotron">
          <h1>IPL</h1>
          <p>Indian Premier League (IPL) is a Twenty20 cricket tournament where different franchise teams participate for the title. The tournament started in 2008 and from then it usually takes place every year in the months of April June.
          It is currently supervised by BCCI Vice-President Ranjib Biswal, who serves as the League's Chairman and Commissioner.
          IPL is the most-watched Twenty20 cricket league in the world and also known for its commercial success.</p>
          <a href="/admin/persons" class="btn btn-primary btn-lg">Enter Details &raquo;</a> &nbsp;
          <a href="#" class="btn btn-danger btn-lg" id="flush-data">Flush all data </a>
      </div>
      <hr>
    </div>
  <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>