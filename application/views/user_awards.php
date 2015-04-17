 <!DOCTYPE html>
<html>
  <head>
    <title>Awards</title>
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
        <a href="/" class="navbar-brand">IPL</a>
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
            <li>
              <a href="/teams">Teams</a>
            </li>
            <li>
              <a href="/fixtures">Fixtures</a>
            </li>
            <li  class="active">
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
                <h1 class="text-center">IPL 2014 Awards</h1>
              </div>
              <br><br>
              <div class="page-body">
              	<div class="row">
              		<div class="col-md-2">

              		</div>
              		<div class="col-md-3">
              			<h3 style="color:orange;" class="text-center">Orange Cap</h3>
              			<img src="<?php echo $orangeCap['photo_url']?>" class="img-thumbnail" alt="Orange Cap">
              			<table class="table table-condensed">
              				<tr>
              					<td><strong>Name</strong></td>
              					<td><?php echo $orangeCap['f_name']. " ".$orangeCap['l_name']?></td>
              				</tr>
              				<tr>
              					<td><strong>Team Name</strong></td>
              					<td><?php echo $orangeCap['team_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Total Runs</strong></td>
              					<td><?php echo $orangeCap['total_runs'] ?></td>
              				</tr>
              			</table>
              		</div>

              		<div class="col-md-3">
              			<h3 style="color:purple;" class="text-center">Purple Cap</h3>
              			<img src="<?php echo $purpleCap['photo_url']?>" class="img-thumbnail" alt="Purple Cap">
              			<table class="table table-condensed">
              				<tr>
              					<td><strong>Name</strong></td>
              					<td><?php echo $purpleCap['f_name']. " ".$purpleCap['l_name']?></td>
              				</tr>
              				<tr>
              					<td><strong>Team Name</strong></td>
              					<td><?php echo $purpleCap['team_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Total Wickets</strong></td>
              					<td><?php echo $purpleCap['total_wickets'] ?></td>
              				</tr>
              			</table>
              		</div>

              		<div class="col-md-3">
              			<h3 class="text-center text-success">Most Sixes</h3>
              			<img src="<?php echo $mostSixes['photo_url'] ?>" class="img-thumbnail" alt="Most Sixes">
              			<table class="table table-condensed">
              				<tr>
              					<td><strong>Name</strong></td>
              					<td><?php echo $mostSixes['f_name']." ".$mostSixes['l_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Team Name</strong></td>
              					<td><?php echo $mostSixes['team_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Total Sixes</strong></td>
              					<td><?php echo $mostSixes['six_count'] ?></td>
              				</tr>
              			</table>
              		</div>

              	</div>

              	<div class="row">
              		<div class="col-md-2">

              		</div>
              		<div class="col-md-3">
              			<h3 class="text-center text-info">Longest Six</h3>
              			<img src="<?php echo $longestSix['photo_url'] ?>" class="img-thumbnail" alt="Longest Six">
              			<table class="table table-condensed">
              				<tr>
              					<td><strong>Name</strong></td>
              					<td><?php echo $longestSix['f_name']." ".$longestSix['l_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Team Name</strong></td>
              					<td><?php echo $longestSix['team_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Distance (m)</strong></td>
              					<td><?php echo $longestSix['distance_in_mtr'] ?></td>
              				</tr>
              			</table>
              		</div>

              		<div class="col-md-3">
              			<h3 class="text-center text-danger">Fastest 50</h3>
              			<img src="<?php echo $fastest50['photo_url'] ?>" class="img-thumbnail" alt="Fastest 50">
              			<table class="table table-condensed">
              				<tr>
              					<td><strong>Name</strong></td>
              					<td><?php echo $fastest50['f_name']." ".$fastest50['l_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Match</strong></td>
              					<td><?php echo $fastest50['team1_name']." vs ".$fastest50['team2_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Balls</strong></td>
              					<td><?php echo $fastest50['balls'] ?></td>
              				</tr>
              			</table>
              		</div>

              		<div class="col-md-3">
              			<h3 class="text-center text-warning">Fastest 100</h3>
              			<img src="<?php echo $fastest100['photo_url'] ?>" class="img-thumbnail" alt="Fastest 100">
              			<table class="table table-condensed">
              				<tr>
              					<td><strong>Name</strong></td>
              					<td><?php echo $fastest100['f_name']." ".$fastest100['l_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Match</strong></td>
              					<td><?php echo $fastest100['team1_name']." vs ".$fastest100['team2_name'] ?></td>
              				</tr>
              				<tr>
              					<td><strong>Balls</strong></td>
              					<td><?php echo $fastest100['balls'] ?></td>
              				</tr>
              			</table>
              		</div>

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