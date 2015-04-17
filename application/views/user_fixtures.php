 <!DOCTYPE html>
<html>
  <head>
    <title>Fixtures</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
    	var data;
    	google.load("visualization", "1", {packages:["corechart"]});

    	function drawChart(number) {

        var options = {
          title: 'Team Player Roles',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('team'+number));
        chart.draw(data, options);
       }
    </script>
    <script type="text/javascript">

      $(document).ready(function(){

         $.ajax({
          type: "POST",
          url: "<?php echo site_url('fixtures/getRoles')?>",
          data: "<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
          dataType: "json",
          success: function(results){

          	var i=0;
          	console.log(results);

            $.each(results, function(l, result){
              i++;
              var arr = [['Role', 'Count']];
              $.each(result, function(k, object){
              	var item = [object.role, parseInt(object.role_count)];
              	arr.push(item);
				$("#teamname_"+i).html(object.name);
              })
              data = google.visualization.arrayToDataTable(arr);
              drawChart(i);
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
        <a href="#" class="navbar-brand">IPL</a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li >
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
            <li class="active">
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
                <h1>IPL 2014 Fixtures/Matches</h1>
              </div>

              <div class="page-body">
              	<div>
              		<table class="table table-striped" id="personInfo">
	                  <thead>
	                    <tr>
	                      <th>Team 1</th>
	                      <th>Team 2</th>
	                      <th>Venue</th>
	                      <th>Date</th>
						  <th>Completed</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                    <?php
	                      foreach ($fixtureResults as $key => $row) {
	                        $time =  gmdate("Y-m-d H:i", $row['date_time']);
	                        echo "<tr>";
	                        echo "<td>$row[team1_name]</td>";
	                        echo "<td>$row[team2_name]</td>";
	                        echo "<td>$row[venue_name]</td>";
	                        echo "<td>$time</td>";
	                        if($row['completed'])
                          		echo "<td class = 'text-success'>Yes</td>";
                        	else
                          		echo "<td class = 'text-danger'>No</td>";
	                        echo "</tr>";
	                      }
	                    ?>
	                  </tbody>
	                </table>
              	</div>

              	<div>
              		<h3>Teams <small>by player roles</small></h3>
              		<div class="row">
              			<div class="col-md-3">
              				<h3 id="teamname_1"></h3>
              				<div id="team1"></div>
              			</div>

              			<div class="col-md-3">
              				<h3 id="teamname_2"></h3>
              				<div id="team2"></div>
              			</div>

              			<div class="col-md-3">
              				<h3 id="teamname_3"></h3>
              				<div id="team3"></div>
              			</div>

              			<div class="col-md-3">
              				<h3 id="teamname_4"></h3>
              				<div id="team4"></div>
              			</div>

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

