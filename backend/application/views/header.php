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
    <!-- NProgress -->
    <link href="<?= base_url('Gentelella') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- ICheck -->
    <link href="<?= base_url('Gentelella') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	 <!-- fancybox-->
    <link href="<?= base_url('assets') ?>/js/fancybox/jquery.fancybox.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('Gentelella') ?>/build/css/custom.min.css" rel="stylesheet">
	 <link href="http://staff.sci.ubu.ac.th/assets/css/jquery.Jcrop.min.css" rel="stylesheet">

	 <!-- data table-->
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.15/b-1.3.1/se-1.2.2/datatables.min.css"/>
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>

	 <!-- staff backend styles -->
    <link href="<?= base_url('assets') ?>/css/staff.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Kanit|Trirong|Athiti" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href='<?= site_url('main/dashboard') ?>'><img id='avatar-icon' src="<?= base_url("../avatars/".$info->ubu_mail.".png")."?".rand() ?>" alt="..." class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $this->session->userdata("name") ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('main/dashboard') ?>">หน้าหลัก</a></li>
                      <li><a href="<?= site_url('main/edit_profile') ?>">แก้ไขข้อมูลพื้นฐาน</a></li>
                      <li><a href="<?= site_url('main/edit_picture') ?>">แก้ไขรูปภาพ</a></li>
                      <li><a href="<?= site_url('main/groups') ?>">กลุ่มวิจัย</a></li>
							 <!--
                      <li><a href="<?= site_url('main/edit_group') ?>">แก้ไขกลุ่มวิจัย</a></li>
							 -->
                    </ul>
                  </li>
               </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
             </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= site_url('main/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<?= $this->session->userdata("name") ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= site_url('main/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                  </ul>

                </li>

					 <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="message">
									No Message
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
               </ul>

            </nav>
          </div>
        </div>
        <!-- /top navigation -->


