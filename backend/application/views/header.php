<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Sci staff dashboard | </title>
    <link rel="apple-touch-icon" href="<?= base_url('chameleon') ?>/theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('chameleon') ?>/theme-assets/images/ico/sci_atomic.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('chameleon') ?>/theme-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('chameleon') ?>/theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('chameleon') ?>/theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('chameleon') ?>/theme-assets/css/core/colors/palette-gradient.css">


    <!-- Font Awesome -->
    <link href="<?= base_url('Gentelella') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('Gentelella') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- ICheck -->
    <link href="<?= base_url('Gentelella') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- fancybox-->
    <link href="<?= base_url('assets') ?>/js/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/css/staff.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <!-- <link href="<?= base_url('Gentelella') ?>/build/css/custom.min.css" rel="stylesheet"> -->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                            <ul class="dropdown-menu">
                                <li class="arrow_box">
                                    <form>
                                        <div class="input-group search-box">
                                            <div class="position-relative has-icon-right full-width">
                                                <input class="form-control" id="search" type="text" placeholder="Search here...">
                                                <div class="form-control-position navbar-search-close"><i class="ft-x"> </i></div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                    <?php if($info->language == "th"){ ?>

                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-th">
                            </i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box">
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-th"></i> <input id="thai_title" type="radio" name="iCheck" <?= $info->language == "th" ? "checked" : ""  ?>>Thai</a>
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> <input id="english_title" type="radio" name="iCheck" <?= $info->language == "en" ? "checked" : ""  ?>>English</a>
                                </div>
                            </div>
                        </li>
                        <?php }else if($info->language == "en"){ ?>
                            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us">
                            </i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box">
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-th"></i> <input id="thai_title" type="radio" name="iCheck" <?= $info->language == "th" ? "checked" : ""  ?>>Thai</a>
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> <input id="english_title" type="radio" name="iCheck" <?= $info->language == "en" ? "checked" : ""  ?>>English</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                    </ul>
                    <!-- <p>
                        แสดงหัวข้อภาษา :
                        <input id="english_title" type="radio" name="iCheck" <?= $info->language == "en" ? "checked" : ""  ?>><label for="english_title"> &nbsp; English</label>

                        &nbsp;<input id="thai_title" type="radio" name="iCheck" <?= $info->language == "th" ? "checked" : ""  ?>><label for="thai_title"> &nbsp; ภาษาไทย</label>
                    <p> -->
                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img src="<?= base_url("../avatars/" . $info->ubu_mail . ".png") . "?" . rand() ?>" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right">
                                    <a class="dropdown-item" href="<?= site_url('main/dashboard') ?>">
                                        <span class="avatar avatar-online">
                                            <img href='<?= site_url('main/dashboard') ?>' src="<?= base_url("../avatars/" . $info->ubu_mail . ".png") . "?" . rand() ?>" alt="avatar">
                                            <span class="user-name text-bold-200 ml-1"><?= $this->session->userdata("name") ?></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= site_url('main/edit_profile') ?>"><i class="ft-user"></i> Edit Profile</a>
                                    <a class="dropdown-item" href='../../../<?= $info->ubu_mail ?>'><i class="ft-mail"></i> My CV</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" title="Logout" href="<?= site_url('main/logout') ?>"><i class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?= base_url('chameleon') ?>/theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
                        <h3 class="brand-text">ระบบจัดการข้อมูล CV</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?= site_url('main/dashboard') ?>"><i class="ft-home"></i><span class="menu-title" data-i18n="">หน้าหลัก</span></a>
                </li>
                <li class="nav-item"><a href="<?= site_url('main/edit_profile') ?>"><i class="ft-user"></i><span class="menu-title" data-i18n="">แก้ไขข้อมูลพื้นฐาน</span></a>
                </li>
                <li class=" nav-item"><a href="<?= site_url('main/edit_picture') ?>"><i class="la la-image"></i><span class="menu-title" data-i18n="">แก้ไขรูปภาพ</span></a>
                </li>
                <li class=" nav-item"><a href="<?= site_url('main/groups') ?>"><i class="la la-group"></i><span class="menu-title" data-i18n="">กลุ่มวิจัย</span></a>
                </li>
                <li class=" nav-item"><a href="<?= site_url('main/research') ?>"><i class="la la-book"></i><span class="menu-title" data-i18n="">งานวิจัย</span></a>
                </li>
                <li class=" nav-item"><a href="<?= site_url('main/workload') ?>"><i class="la la-archive"></i><span class="menu-title" data-i18n="">ภาระงาน</span></a>
                </li>
                <li class=" nav-item"><a href="<?= site_url('main/document') ?>"><i class="la la-bullhorn"></i><span class="menu-title" data-i18n="">คำสั่ง</span></a>
                </li>
                <li class=" nav-item"><a href="<?= site_url('main/users') ?>"><i class="la la-user-plus"></i><span class="menu-title" data-i18n="">จัดการผู้ใช้งาน</span></a>
                </li>

            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>


    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url('chameleon') ?>/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url('chameleon') ?>/theme-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/scripts/charts/chartjs/bar/column.js" type="text/javascript"></script>
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/scripts/charts/chartjs/bar/bar.js" type="text/javascript"></script>
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/scripts/charts/chartjs/line/line.js" type="text/javascript"></script>
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/scripts/charts/chartjs/pie-doughnut/pie-simple.js" type="text/javascript"></script>
    <script src="<?= base_url('chameleon') ?>/theme-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut-simple.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
</body>

</html>