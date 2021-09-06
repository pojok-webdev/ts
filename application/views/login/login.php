<html>
  <head>
    <title>Padi Apps</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/lightbox/css/lightbox.css'); ?>" >

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
      <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script src="<?php echo base_url('assets/lightbox/js/lightbox.js'); ?>"></script>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <br><br><br><br><br>
          <?php echo validation_errors(); ?>
          <h2 class="text-center"><?php echo $title; ?></h2>
          <?php echo form_open('login/login_page');?>
          <div class="form-group">
            <label for='username'>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" id="username">
          </div>

          <div class="form-group">
            <label for='password'>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
          </div>

          <input type="hidden" name="id_user" id="id_user" value="1">
          <input type="hidden" name="status" id="status" value="">
          <!-- <button type="submit" class="btn btn-default">Submit</button> -->
          <?php echo form_submit(['name'=>'submit', 'value'=>'Submit','class'=>'btn btn-primary btn-block']);?>
          <?php echo form_close();?>

          <?php 
            if(isset($error))
            {
              ?>
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Failed!</strong> Username or Password is Wrong
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php
            }
            if(isset($status))
            {
              ?>
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Failed!</strong> Username has been blocked.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php
            }
          ?>
         
          <!-- <a href="" class="btn btn-danger btn-block">Register</a> -->
        </div>
        <div class="col-4"></div>
      </div>
