<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>วิทยาศาสตร์มหาบัณฑิต คณะวิทยาศาสตร์ มหาวิทยาลัยอุบลราชธาานี </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('Gentelella') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('Gentelella') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('Gentelella') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('Gentelella') ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('Gentelella') ?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <h1 style='text-align:center;font-size: 1.8em; margin-top: 30px'>ระบบจัดการข้อมูล CV คณะวิทยาศาสตร์</h1>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
			 <?= form_open('main/login') ?>
              <h1>Login Form</h1>
              <div>
                <input type="text" id="staff_uname" name="staff_uname"class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" id="staff_pass" name="staff_pass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Log in</button>
	           </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div>
                  <p>©2017 All Rights Reserved. Faculty of Science, Ubon Ratchathani University</p>
                </div>
              </div>
			<?= form_close() ?>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
