<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('login-form') ?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('login-form') ?>/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('login-form') ?>/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('login-form') ?>/css/style.css">

    <title>วิทยาศาสตร์มหาบัณฑิต คณะวิทยาศาสตร์ มหาวิทยาลัยอุบลราชธาานี </title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url('login-form') ?>/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
            <br>
           <br>
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">ระบบจัดการข้อมูล CV คณะวิทยาศาสตร์</p>
            </div>
            <?= form_open('main/login') ?>

              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="staff_uname" name="staff_uname" required="">

              </div>
              <br>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="staff_pass" name="staff_pass" required="">
                
              </div>
              
              <!-- <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div> -->

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted align-items-center"><p>&mdash; ©2022 All Rights Reserved. Faculty of Science, Ubon Ratchathani University &mdash;</p></span>
              
              <!-- <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a> -->
              </div>
              <?= form_close() ?>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="<?= base_url('login-form') ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('login-form') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('login-form') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('login-form') ?>/js/main.js"></script>
  </body>
</html>