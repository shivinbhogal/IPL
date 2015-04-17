<!DOCTYPE html>
<html>
  <head>
    <title>Match Details</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>

    <script type="text/javascript">

      var match_id = <?php echo $matchId;?>;
      $(document).ready(function(){

        $("#sixSubmit").click(function(){

          var distance = $("#sixDistance").val();
          var player = $("#sixPlayer").val();

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_six')?>",
            data: "match_id="+match_id+"&player_id="+player+"&distance="+distance+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            success: function(result){

              $("#formErrors").removeClass();
              $("#formErrors").addClass("alert alert-success");
              $("#formErrors").html("Six successfully  added");

            }
          });

        });

        $(".battingCheckbox").click(function(){

          var player_id = $(this).attr('data-id');
          var tr = $(this).parents("tr");
          var runs = tr.find("#runs").val();
          var balls = tr.find("#balls").val();

          tr.addClass("success");

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_batting_stat')?>",
            data: "match_id="+match_id+"&runs="+runs+"&balls="+balls+"&player_id="+player_id+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            success: function(result){

              tr.fadeOut(1000);
              if(runs >= 50 && runs < 100)
              {
                var balls50 = prompt("Enter number of deliveries for 50");

                if(balls50 != null)
                {
                  $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/add_50')?>",
                    data: "match_id="+match_id+"&player_id="+player_id+"&balls="+balls50+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
                    success: function(){
                      alert("Done");
                    }
                  });
                }
              }
              else if(runs >=100)
              {
                var balls100 = prompt("Enter number of deliveries for 100");

                if(balls100 != null)
                {
                  $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/add_100')?>",
                    data: "match_id="+match_id+"&player_id="+player_id+"&balls="+balls100+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
                    success: function(){
                      alert("Done");
                    }
                  });
                }
              }

            }
          });

        });

        $(".bowlingCheckbox").click(function(){

          var player_id = $(this).attr('data-id');
          var tr = $(this).parents("tr");
          var wickets = tr.find("#wickets").val();
          var balls = tr.find("#deliveries").val();

          tr.addClass("success");

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_bowling_stat')?>",
            data: "match_id="+match_id+"&wickets="+wickets+"&balls="+balls+"&player_id="+player_id+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            success: function(result){

              tr.fadeOut(1000);

            }
          });

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
                <h1>Enter Match Details</h1>
              </div>

              <div class="page-body">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="text-danger"> <?php echo $resultMatch['team1_name']?></h2>
                    <div>
                      <p><strong>Batting</strong></p>
                      <table class="table table-striped" id="personinfo">
                        <thead>
                          <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Runs</th>
                            <th>Balls</th>
                            <th>Select</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($teamOne as $key => $row) {
                              echo "<tr>";
                              echo "<td>$row[f_name]</td>";
                              echo "<td>$row[l_name]</td>";

                              echo "<td width='25%'>
                                      <input type='text' placeholder='Runs' id='runs' class='form-control'>
                                    </td>";
                              echo "<td width='25%'>
                                      <input type='text' placeholder='Balls' id='balls' class='form-control'>
                                    </td>";

                              echo "<td >
                                      <input type='checkbox' class='battingCheckbox' data-id='$row[player_id]'>
                                    </td>";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>

                    <div>
                      <p><strong>Bowling</strong></p>
                      <table class="table table-striped" id="personInfo">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Wickets</th>
                            <th>Balls</th>
                            <th>Select</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($teamOne as $key => $row) {
                              echo "<tr>";
                              echo "<td>$row[f_name]</td>";
                              echo "<td>$row[l_name]</td>";

                              echo "<td width='25%'>
                                      <input type='text' placeholder='Wickets' id='wickets' class='form-control'>
                                    </td>";
                              echo "<td width='25%'>
                                      <input type='text' placeholder='Balls' id='deliveries' class='form-control'>
                                    </td>";

                              echo "<td>
                                      <input type='checkbox' class='bowlingCheckbox' data-id='$row[player_id]'>
                                    </td>";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>

                    <label for="sixes">Sixes</label>
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="form-group">
                          <select class="form-control" id="sixPlayer">
                            <?php
                              foreach ($teamOne as $key => $row) {
                                echo "<option value='$row[player_id]'>";
                                echo "$row[f_name] $row[l_name]";
                                echo "</option>";
                              }

                              foreach ($teamTwo as $key => $row) {
                                echo "<option value='$row[player_id]'>";
                                echo "$row[f_name] $row[l_name]";
                                echo "</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <input type='text' placeholder='Distance in Meters' id='sixDistance' class='form-control'>
                      </div>
                      <div class="col-lg-2">
                        <a href="#" class="btn btn-default" id="sixSubmit">Submit</a>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <h2 class="text-danger"> <?php echo $resultMatch['team2_name']?></h2>
                    <div>
                      <p><strong>Batting</strong></p>
                      <table class="table table-striped" id="personInfo">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Runs</th>
                            <th>Balls</th>
                            <th>Select</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($teamTwo as $key => $row) {
                              echo "<tr>";
                              echo "<td>$row[f_name]</td>";
                              echo "<td>$row[l_name]</td>";

                              echo "<td width='25%'>
                                      <input type='text' placeholder='Runs' id='runs' class='form-control'>
                                    </td>";
                              echo "<td width='25%'>
                                      <input type='text' placeholder='Balls' id='balls' class='form-control'>
                                    </td>";

                              echo "<td width='10%'>
                                      <input type='checkbox' class='battingCheckbox' data-id='$row[player_id]'>
                                    </td>";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>

                    <div>
                      <p><strong>Bowling</strong></p>
                      <table class="table table-striped" id="personInfo">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Wickets</th>
                            <th>Balls</th>
                            <th>Select</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($teamTwo as $key => $row) {
                              echo "<tr>";
                              echo "<td>$row[f_name]</td>";
                              echo "<td>$row[l_name]</td>";

                              echo "<td width='25%'>
                                      <input type='text' placeholder='Wickets' id='wickets' class='form-control'>
                                    </td>";
                              echo "<td width='25%'>
                                      <input type='text' placeholder='Balls' id='deliveries' class='form-control'>
                                    </td>";

                              echo "<td>
                                      <input type='checkbox' class='bowlingCheckbox' data-id='$row[player_id]' >
                                    </td>";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <br>
                    <div id="formErrors"></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <center><a href="<?php echo site_url('admin/matches')?>" class="btn btn-primary">Next &raquo;</a></center>
      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>