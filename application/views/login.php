<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Login Page | Random Questions Generator</title>
  <meta name="msapplication-TileColor" content="#FC0624">
  <!-- CORE CSS-->
  <link href="<?php echo base_url()?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url()?>css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>
    <body class="grey lighten-4">
         <div id="login-page" class="row">
    <div class="col m12 s12 l12 z-depth-4 card-panel">
      <form class="login-form"  method="POST"  action="<?php echo base_url() ?>admin/authenticate_admin">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">Random Questions Paper Generator</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input type="text" id="username" name="username" class="form-control"  required>
            <label for="username" class="center-align">User ID</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
           <input type="password" id="pwd" name="pwd" class="form-control" required >
            <label for="pwd">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light red darken-1 col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 l12">
              <center>
              <span style="color: red;" id="error"><?php if($this->session->flashdata("response") !== NULL) {echo $this->session->flashdata("response");} ?></span>
              </center>
              
          </div>        
        </div>

      </form>
    </div>
  </div>
        

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url()?>js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url()?>js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url()?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url()?>js/plugins.js"></script>

</body>

</html>