<!DOCTYPE html>
<html lang="th">

<head>




   <meta name="description" content="">
   <!---meta name="viewport" content="width=device-width, initial-scale=1"---->
   <link rel="manifest" href="site.webmanifest">
   <link rel="icon" href="/favicon.png'">
   <link rel="apple-touch-icon" href="../icon.png'">



   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Place favicon.ico in the root directory -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,500,600" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/icons/icomoon.css">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/icons/fontawesome-all.min.css">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/css/plugins.css">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/css/main.css">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
   <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/swiper.min.css">
   <title>Sci staff dashboard | </title>


   <link href="http://staff.sci.ubu.ac.th/assets/css/jquery.Jcrop.min.css" rel="stylesheet">

   <!-- data table-->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.15/b-1.3.1/se-1.2.2/datatables.min.css" />
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />

   <!-- staff backend styles -->
   <link href="https://fonts.googleapis.com/css?family=Kanit|Trirong|Athiti" rel="stylesheet">


</head>

<body>
   <!-- Page Content START -->
   <div class="page-content">
      <!-- Main Nav START -->
      <nav id="main-nav" class="main-nav fixed">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="nav-header d-flex justify-content-between align-items-center">
                     <a href="index.html" class="logo" title="LOGO">
                        <img class="logo-img"  alt="CV">
                        <img class="alt-logo-img"  alt="CV">
                     </a>
                  </div>
                  <div class="nav-wrap">
                     <ul id="nav" class="nav-wrap__list menu">
                        <li class="current"><a href="/" title="หน้าหลัก">หน้าหลัก</a></li>
                        <li><a href="/about.html" title="ข้อมูลส่วนตัว">ข้อมูลส่วนตัว</a></li>
                        <li><a href="/donate.html" title="Донат"><span class="red-fox">Донат</span></a></li>
                        <li><a href="/contacts.html" title="Контакты">Контакты</a></li>
                        <div class="dropdown">
                           <span>
                              <div class="drop-ed"></div>
                           </span>
                           <div class="dropdown-content">
                              <span class="arrow_box"></span>
                              <ul class="drop-vape">
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                                 <li><a href="#">Банлист</a></li>
                              </ul>
                           </div>
                        </div>
                     </ul>
                     <div class="riglt-floats-xs">
                        <a href="#" class="btn-login"><span class="ic-sx21"></span> <?= $this->session->userdata("name") ?></a>
                        <a href="/how-start.html" class="btn-startgames"><span class="ic-sx22"></span> Log out</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </nav>
      <!-- /top navigation -->



      <script src="<?= base_url('assets') ?>/dist/js/swiper.min.js"></script>
      <!-- Initialize Swiper -->
      <script>
         var swiper = new Swiper('.swiper-container', {
           spaceBetween: 30,
           hashNavigation: {
             watchState: true,
           },
           pagination: {
             el: '.swiper-pagination',
             clickable: true,
           },
           navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
           },
         });
      </script>
      <script src="<?= base_url('assets') ?>/js/jquery.min.js"></script>
      <script src="<?= base_url('assets') ?>/js/circle-progress.js"></script>
      <script src="<?= base_url('assets') ?>/js/examples.js"></script>
      <script src="<?= base_url('assets') ?>/js/vendor/modernizr-3.5.0.min.js"></script>
      <script src="<?= base_url('assets') ?>/js/vendor/jquery-3.2.1.min.js"></script>
      <script src="<?= base_url('assets') ?>/js/plugins.js"></script>
      <script src="<?= base_url('assets') ?>/js/main.js"></script>

      <style>

.drop-ed {
    width: 25px;
    height: 6px;
    background: url('<?= base_url('assets') ?>/icons/droped.png') no-repeat;
    background-size: contain;
    cursor: pointer;
}
span.ic-sx21 {
    width: 21px;
    height: 21px;
    background: url('<?= base_url('assets') ?>/icons/ic26.png') no-repeat;
    background-size: contain;
    margin-left: 10px;
    float: left;
    margin-top: 12px;
    padding-right: 30px;
    border-right: 1px solid rgba(255, 255, 255, 0.15);
}
span.img-ste1 {
    background: url('<?= base_url('assets') ?>/icons/img-ste1.png') no-repeat;
    display: block;
    width: 560px;
    height: 420px;
    background-size: contain;
}
a.block-s1 {
    width: 256px;
    height: 130px;
    background: url('<?= base_url('assets') ?>/img/block-1s.png') no-repeat;
    display: block;
    transition: .5s;
    margin-top: 100px;
    margin-bottom: -110px;
}
a.block-s1.p2 {
    background: url('<?= base_url('assets') ?>/img/block-2s.png') no-repeat;
}
span.ic-sx24 {
    width: 23px;
    height: 15px;
    background: url('<?= base_url('assets') ?>/icons/eye.png') no-repeat;
    background-size: contain;
    margin-left: 10px;
    float: left;
    margin-top: 13px;
    padding-right: 30px;
    border-right: 1px solid rgba(255, 255, 255, 0.15);
}
span.ic-info {
    width: 77px;
    height: 77px;
    display: -webkit-inline-box;
    background: url('<?= base_url('assets') ?>/icons/info.png') no-repeat;
    border-radius: 100%;
    box-shadow: 0px 15px 65px 0px rgba(0, 0, 0, 0.15);
}
a.btn-view:after {
    content: "";
    background: url('<?= base_url('assets') ?>/icons/pt.png') no-repeat;
    width: 200px;
    height: 55px;
    display: block;
    margin-top: -45px;
    margin-left: 50px;
}
.new-tab-link {
  padding-right: 14px;
  background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3ggXDSIzCeRHfQAAABl0RVh0Q29tbWVudABDcmVhdGVkIHdpdGggR0lNUFeBDhcAAAA9SURBVBjTY2RAA/+XMvxHF2NkwAOwacCq4P9Shv8suFQzRiNsYUEXwKoJ2VhkNrIaJgYiAAs2N2BVRMirAD6JHi10MCdVAAAAAElFTkSuQmCC) no-repeat right center;
}
span.corp-design {
    width: 120px;
    height: 50px;
    background: url(https://i.imgur.com/QUp8M7S.png) no-repeat;
    display: block;
    float: right;
    margin-top: 11px;
    opacity: .4;
    transition: .5s;
}
.bg-lefts {
    width: 100%;
    height: 600px;
    display: block;
    background: url('<?= base_url('assets') ?>/img/bg-left.png') no-repeat;
    position: absolute;
}
span.video-icons {
    width: 65px;
    height: 65px;
    background: url('<?= base_url('assets') ?>/icons/video.png');
    display: block;
}
span.ic-love {
    width: 77px;
    height: 77px;
    display: -webkit-inline-box;
    background: url('<?= base_url('assets') ?>/icons/loved.png') no-repeat;
    border-radius: 100%;
    box-shadow: 0px 15px 65px 0px rgba(0, 0, 0, 0.15);
}
span.ic-loveb {
    width: 21px;
    height: 18px;
    background: url('<?= base_url('assets') ?>/icons/loveb.png') no-repeat;
    background-size: contain;
    margin-left: 10px;
    float: left;
    margin-top: 15px;
    padding-right: 30px;
    border-right: 1px solid rgba(255, 255, 255, 0.15);
}
span.ic-g {
    width: 30px;
    height: 30px;
    background: url('<?= base_url('assets') ?>/icons/g.png') no-repeat;
    display: -webkit-box;
}
span.vk-btn {
    width: 43px;
    height: 20px;
    background: url('<?= base_url('assets') ?>/icons/vkr.png') no-repeat;
    display: block;
}
span.ic-dw {
    width: 22px;
    height: 22px;
    background: url('<?= base_url('assets') ?>/icons/dw.png') no-repeat;
    background-size: contain;
    margin-left: 10px;
    float: left;
    margin-top: 13px;
    padding-right: 30px;
    border-right: 1px solid rgba(255, 255, 255, 0.15);
}
      </style>