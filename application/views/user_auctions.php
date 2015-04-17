 <!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <title>Auctions</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>

    <script type="text/javascript">
       google.load('visualization', '1.0', {'packages':['corechart']});
       google.setOnLoadCallback(addObject);

       var data;

       function addObject() {
         data = new google.visualization.DataTable();
         data.addColumn('string', 'Team Name');
         data.addColumn('number', 'Bid Amount');

       }

       function drawChart() {

        // Set chart options
        var options = {'title':'Auction amount (in $) by teams',
                       'width':400,
                       'height':300, is3D: true};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">

      $(document).ready(function(){

        var arr = [];
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('auction/getTeamResults')?>",
          data: "<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
          dataType: "json",
          success: function(result){

            $.each(result, function(i, object){
              var item = [object.name, parseInt(object.amt)];
              arr.push(item);
            });

            console.log(arr);
            data.addRows(arr);

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
            <li class="active">
              <a href="#">Auctions</a>
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

  <!--   =========-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="panel-header">
                <h1>IPL 2014 Auctions</h1>
                <p>Below are the auction results of IPL 2014</p>
              </div>

              <div class="page-body">
                <div class="row">
                  <div class="col-lg-7">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Player Name</th>
                          <th>Team Name</th>
                          <th>Bid Amount ($)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($auctions as $key => $auction) {
                            echo "<tr>";
                            echo "<td>$auction[f_name] $auction[l_name]</td>";
                            echo "<td>$auction[name]</td>";
                            echo "<td>$auction[bid_amt]</td>";
                            echo "</tr>";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-5">
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
