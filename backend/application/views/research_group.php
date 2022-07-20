<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sci staff dashboard | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('Gentelella') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('Gentelella') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- ICheck -->
    <link href="<?= base_url('Gentelella') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	 <!-- fancybox-->
    <link href="<?= base_url('assets') ?>/js/fancybox/jquery.fancybox.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('Gentelella') ?>/build/css/custom.min.css" rel="stylesheet">
	 <!-- staff backend styles -->
    <link href="<?= base_url('assets') ?>/css/staff.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Kanit|Trirong|Athiti" rel="stylesheet">
	 <style>
	  body{
	  	background-color: white;
	  }
	 </style>

  </head>

  <body>
  <div class="container">
  	<h3>กลุ่ม <?= $group->name ?></h3>
	<div class="row">
	<div class="col-md-3">
	 <h4>สมาชิก</h4>
	 <ul>
		<?php
			foreach($members as $m){
				if(is_array($m)){
					echo "<li>".$m["name"]."</li>";
				}
			}
		?>
	 </ul>
	</div>
	</div><!--end row-->
	<div class="row text-center">
			<?php if($isAdmin==true): ?>
			<button id="delete-group" class="btn btn-danger">ลบกลุ่ม</button>
			<?php endif; ?>
	</div>
  </div>
  </body>
  </html>
 
