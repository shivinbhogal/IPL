<!DOCTYPE html>
<html>
  <head>
    <title>Sponsors</title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.min.css')?>"/>
    <link rel="icon" type="image/png" href="<?php echo site_url('media/img/favicon.ico')?>"/>
    <style type="text/css">

    </style>
    <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
    <script type="text/javascript">

      $(document).ready(function(){

        $("#submitSponsor").click(function(){

          	var name = $("#name").val();
          	$("#formErrors").html("");
          	if(name == '')
          	{
            	alert("Please enter Sponsor Name");
            	return;
          	}
          	$.ajax({
            	type: "POST",
            	url: "<?php echo site_url('admin/add_sponsor')?>",
            	data: "name="+name+"&<?php echo $this->security->get_csrf_token_name()?>="+"<?php echo $this->security->get_csrf_hash()?>",
            	success: function(result){

	        	    $("#formErrors").removeClass();
    	        	$("#formErrors").addClass("alert alert-success");
        	      	$("#formErrors").html("Sponsor successfully added !");
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
                <h1>Sponsors</h1>
                <p>Enter the name of the sponsors</p>
                <div id="formErrors"></div>
              </div>

              <div class="page-body">
                <div class="row">
                  <div class="col-md-4">
                    <form>
                      <div class="form-group">
                        <label for="name">Sponsor Name</label>
                        <input type="email" class="form-control" id="name" placeholder="Enter Sponsor Name">
                        <br>
                        <a href="#" id="submitSponsor" class="btn btn-info">Submit</a>
                      </div>
                    </form>
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