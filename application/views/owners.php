<!DOCTYPE html>
<html>
  <head>
    <title>Owners</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>" />
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>" />
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        var exp; //Proffesion

        $(".owner-input").keyup(function(){

          exp = $(this).val();

          if(exp != '')
          {
            var check = $(this).siblings(".input-group-addon").children();
            check.prop('disabled', false);
          }
          else
          {
            var check = $(this).siblings(".input-group-addon").children();
            check.prop('disabled', true);
          }
        });

        $(".checkbox").click(function(){
          //alert($(this).attr("data-id"));
          var tr = $(this).parents("tr");
          var id = $(this).attr("data-id");

          tr.addClass("success");

          $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/add_owner')?>",
            data: "id="+id+"&exp="+exp+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
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
                <h1>Owners</h1>
                <p>Select the OWNERS from the given list of persons</p>
              </div>

              <div class="page-body">
                <table class="table table-striped" id="personInfo">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Nationality</th>
                      <th>Owner</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($result as $key => $row) {
                        echo "<tr>";
                        echo "<td>$row[f_name]</td>";
                        echo "<td>$row[l_name]</td>";
                        echo "<td>$row[nationality]</td>";
                        echo "<td width='20%'>
                                <div class='row'>
                                  <div class='col-lg-9'>
                                    <div class='input-group'>
                                      <span class='input-group-addon'>
                                        <input type='checkbox' class='checkbox' data-id='$row[id]' disabled>
                                      </span>
                                      <input type='text' class='form-control owner-input' placeholder='Profession'>
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

        <center><a href="<?php echo site_url('admin/venues')?>" class="btn btn-primary">Next &raquo;</a></center>
      </div>
    </div>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>