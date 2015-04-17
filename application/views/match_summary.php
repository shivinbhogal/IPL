<!DOCTYPE html>
<html>
  <head>
    <title>Match Summary</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript">

      $(document).ready(function(){

        $("#submitMatch").click(function(){

  			var person = $("#manOfMatch").val();
  			var team = $("#winningTeam").val();
  			var fix_id = <?php echo $resultFixture['id']?>

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_match')?>",
            data: "person="+person+"&team="+team+"&fix_id="+fix_id+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            success: function(result){

              $("#formErrors").removeClass();
			  $("#formErrors").addClass("alert alert-success");
              $("#formErrors").html("Match successfully added");

              setTimeout(function(){

              	window.location.href = "<?php echo site_url('admin/matchdetail/')?>"+"/"+result;

              }, 3000);
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
                <h1>Match Summary</h1>
                <p>Enter the details of Match No: <?php  echo $matchCount ?> (<strong>Umpire :</strong> <?php echo $resultFixture['umpire_name']?>)</p>
                <h3 class="text-danger"><?php echo $resultFixture['team1_name']." VS ".$resultFixture['team2_name']?></h3>
                <div id="formErrors"></div>
              </div>

              <div class="page-body">
                <div class="row">
                  <div class="col-md-4">
                    <form>
                      <div class="form-group">
                        <label for="winningTeam">Winning Team</label>
                        <select class="form-control" id="winningTeam">
                          <?php
                              echo "<option value='$resultFixture[team1_id]'>";
                              echo "$resultFixture[team1_name]";
                              echo "</option>";
                              echo "<option value='$resultFixture[team2_id]'>";
                              echo "$resultFixture[team2_name]";
                              echo "</option>";
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="manOfMatch">Man of the Match</label>
                        <select class="form-control" id="manOfMatch">
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

                      <a href="#" id="submitMatch" class="btn btn-success">Submit</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <center><a href="<?php //echo site_url('admin/auctions')?>" class="btn btn-primary">Next &raquo;</a></center> -->
      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>
