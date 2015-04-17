<!DOCTYPE html>
<html>
  <head>
    <title>Player Roles</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>" />
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>" />
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        var bowls; //Proffesion

        $(".player-input").keyup(function(){

          bowls = $(this).val();

          if(bowls != '')
          {
            var check = $(this).siblings(".input-group-addon").children();
            check.prop('disabled', false);
          }

        });

        $(".checkbox").click(function(){
          //alert($(this).attr("data-id"));
          var tr = $(this).parents("tr");
          var id = $(this).attr("data-id");
          var bats = tr.find("#bats").val();
          var bowls = tr.find("#bowls").val();
          var role = tr.find("#role").val();

          tr.addClass("success");

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_role')?>",
            data: "id="+id+"&bats="+bats+"&bowls="+bowls+"&role="+role+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            success: function(){
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
                <h1>Player Roles</h1>
                <p>Please enter roles of the players</p>
              </div>

              <div class="page-body">
                <table class="table table-striped" id="personInfo">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Role</th>
                      <th>Bats</th>
                      <th>Bowls</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($result as $key => $row) {
                        echo "<tr>";
                        echo "<td>$row[f_name]</td>";
                        echo "<td>$row[l_name]</td>";
                        echo "<td><select id='role' class='form-control'>
                        		<option value='bowler'>Bowler</option>
                        		<option value='batsman'>Batsman</option>
                        		<option value='all rounder'>All Rounder</option>
                        	  </select></td>";
                       	echo "<td><select id='bats' class='form-control'>
                        		<option value='left'>Left</option>
                        		<option value='right'>Right</option>
                        	  </select></td>";
                        echo "<td width='20%'>
                                <div class='row'>
                                  <div class='col-lg-12'>
                                    <div class='input-group'>
                                      <span class='input-group-addon'>
                                        <input type='checkbox' class='checkbox' data-id='$row[id]' disabled>
                                      </span>
                                      <input type='text' id='bowls' class='form-control player-input' placeholder='Bowling Type'>
                                    </div>
                                  </div>
                                </div>
                              </td>";
                        echo "</tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <center><a href="<?php echo site_url('admin/coaches')?>" class="btn btn-primary">Next &raquo;</a></center>
      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>
