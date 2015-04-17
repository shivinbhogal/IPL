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

        var count = 4;

        $("#submitTeam").click(function(){

          var teamName = $("#teamName").val();
          var homeGround = $("#homeGround").val();

          if(teamName == '')
          {
            alert("Please enter Team Name");
            return;
          }

          if(homeGround == '')
          {
            alert("Please enter Home Ground");
            return;
          }

          var ownerId = $("#ownerSelect").val();
          var coachId = $("#coachSelect").val();
          var captainId = $("#captainSelect").val();

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_team')?>",
            data: "teamName="+teamName+"&ownerId="+ownerId+"&coachId="+coachId+"&captainId="+captainId+"&homeGround="+homeGround+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            success: function(result){

              $("#formErrors").removeClass();

              if(result == 0) //Team Name already exists
              {
                $("#formErrors").addClass("alert alert-danger");
                $("#formErrors").html("Team name already exists");
              }
              else if(result == 1)  //Captain already assigned
              {
                $("#formErrors").addClass("alert alert-danger");
                $("#formErrors").html("This captain is already assigned to other team");
              }
              else
              {
                count--;
                $("#formErrors").addClass("alert alert-success");

                if(count ==0)
                {
                  $("#formErrors").html("All teams successfully added. Thank you. ");
                  return;
                }

                $("#formErrors").html("Team successfully added. You need to enter "+ count + " more team details");
              }

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
                <h1>Teams</h1>
                <p>Enter the details of the teams</p>
                <div id="formErrors"></div>
              </div>

              <div class="page-body">
                <div class="row">
                  <div class="col-md-3">
                    <form>
                      <div class="form-group">
                        <label for="teamName">Team Name</label>
                        <input type="email" class="form-control" id="teamName" placeholder="Enter Team Name">
                      </div>

                      <div class="form-group">
                        <label for="homeGround">Home Ground</label>
                        <input type="email" class="form-control" id="homeGround" placeholder="Enter Home Ground">
                      </div>

                      <div class="form-group">
                        <label for="ownerSelect">Owner</label>
                        <select class="form-control" id="ownerSelect">
                          <?php
                            foreach ($resultOwners as $key => $row) {
                              echo "<option value='$row[id]'>";
                              echo "$row[f_name] $row[l_name]";
                              echo "</option>";
                            }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="coachSelect">Coach</label>
                        <select class="form-control" id="coachSelect">
                          <?php
                            foreach ($resultCoaches as $key => $row) {
                              echo "<option value='$row[id]'>";
                              echo "$row[f_name] $row[l_name]";
                              echo "</option>";
                            }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="captainSelect">Captain</label>
                        <select class="form-control" id="captainSelect">
                          <?php
                            foreach ($resultPlayers as $key => $row) {
                              echo "<option value='$row[id]'>";
                              echo "$row[f_name] $row[l_name]";
                              echo "</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <a href="#" id="submitTeam" class="btn btn-info">Submit</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <center><a href="<?php echo site_url('admin/auctions')?>" class="btn btn-primary">Next &raquo;</a></center>
      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>