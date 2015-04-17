<!DOCTYPE html>
<html>
  <head>
    <title>Teams</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
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
        <a href="/home" class="navbar-brand">IPL</a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/home">Home</a>
            </li>
            <li>
              <a href="/auction">Auctions</a>
            </li>
            <li>
              <a href="/venues">Venues</a>
            </li>
            <li class="active">
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

  <!--   =========-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="panel-header">
                <h1>IPL 2014 Teams</h1>
              </div>

              <div class="page-body">
              	<div>
              		<h3 class="text-success">Team Details</h3>
              		<table class="table table-striped">
	                  <thead>
	                    <tr>
	                      <th>Team Name</th>
	                      <th>Homeground</th>
	                      <th>Owner</th>
	                      <th>Coach</th>
	                      <th>Captain</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                    <?php
	                      foreach ($teams as $key => $row) {
	                        echo "<tr>";
	                        echo "<td>$row[name]</td>";
	                        echo "<td>$row[home_ground]</td>";
	                        echo "<td>$row[owner_fname] $row[owner_lname]</td>";
	                        echo "<td>$row[coach_fname] $row[coach_lname]</td>";
	                        echo "<td>$row[captain_fname] $row[captain_lname]</td>";
	                        echo "</tr>";
	                      }
	                    ?>
	                  </tbody>
                	</table>
              	</div>

              	<div>
              		<h3 class="text-success">Standings</h3>
              		<table class="table table-striped">
	                  <thead>
	                    <tr>
	                      <th>Team Name</th>
	                      <th>Total Matches</th>
	                      <th>Matches Won</th>
	                      <th>Matches Lost</th>
	                      <th>Points</th>
	                      <th>Net Run Rate</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                    <?php
	                      foreach ($standings as $key => $row) {
	                        echo "<tr>";
	                        echo "<td>$row[name]</td>";
	                        echo "<td>$row[total_matches]</td>";
	                        echo "<td>$row[matches_won]</td>";
	                        echo "<td>$row[matches_lost]</td>";
	                        echo "<td>$row[points]</td>";
	                        echo "<td>$row[net_run_rate]</td>";
	                        echo "</tr>";
	                      }
	                    ?>
	                  </tbody>
                	</table>
              	</div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>