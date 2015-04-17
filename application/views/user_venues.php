 <!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <title>Venues</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>

    <script type="text/javascript">
       google.load('visualization', '1.0', {'packages':['corechart']});

       var data;

       function addObject() {
         data = new google.visualization.DataTable();
       }

       function drawChart() {

        // Set chart options
        var options = {'title':'Venues Capacity', hAxis: {title: 'Venues', titleTextStyle: {color: 'red'}}};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">

      $(document).ready(function(){

        var arr = [['Name', 'Capacity']];
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('venues/getVenues')?>",
          data: "<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
          dataType: "json",
          success: function(result){

            $.each(result, function(i, object){
              var item = [object.name, parseInt(object.capacity)];
              arr.push(item);
            });

        	data = google.visualization.arrayToDataTable(arr);
            drawChart();

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
            <li>
              <a href="/home">Home</a>
            </li>
            <li >
              <a href="/auction">Auctions</a>
            </li>
            <li class="active">
              <a href="#">Venues</a>
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

  <!--   =========-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="panel-header">
                <h1>IPL 2014 Venues</h1>
                <p>Below are the venues of IPL 2014</p>
              </div>

              <div class="page-body">
                <div class="row">
                  <div class="col-lg-6">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Venue Name</th>
                          <th>Location</th>
                          <th>Capacity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($venues as $key => $venue) {
                            echo "<tr>";
                            echo "<td>$venue[name]</td>";
                            echo "<td>$venue[location]</td>";
                            echo "<td>$venue[capacity]</td>";
                            echo "</tr>";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6">
                    <!-- <h3>Bidding Amount <small>by team</small></h3> -->
                    <div id="chart_div"></div>
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

