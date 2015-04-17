<html>
  <head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('media/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo site_url('media/css/typica-login.css')?>" />
    <link rel="icon" type="image/png" href="<?php echo site_url('media/css/favicon.ico')?>" />
  </head>
  <body>

  <div class="container">
    <div id="login-wraper">
      <?php $attr = array("class" => "form login-form"); echo form_open('login', $attr);?>
        <legend>
          <span class="blue">Sign in</span>
        </legend>
        <div class="body">
          <?php if(isset($error)){echo "<div class='alert alert-danger'>$error</div>";}?>
          <label>Username</label>
          <input type="text" name="username" required autofocus />
          <br/>
          <label>Password</label>
          <input type="password" name="password" required />
        </div>
        <div class="footer">
          <label class="checkbox inline">
          <input type="checkbox" id="inlineCheckbox1" value="option1" /> Remember me</label>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
  <footer class="white navbar-fixed-bottom"> Only admin access allowed </footer>
  <script src="<?php echo site_url('media/js/jquery.js')?>"></script>
  <script src="<?php echo site_url('media/js/bootstrap.js')?>"></script>
  </body>
</html>