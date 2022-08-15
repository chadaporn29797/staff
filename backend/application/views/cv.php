<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Right Resume</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  </noscript>
  <link href="<?= base_url('assetsforinfo') ?>/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
  <link href="<?= base_url('assetsforinfo') ?>/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
  <link href="<?= base_url('assetsforinfo') ?>/css/aos.css?ver=1.2.0" rel="stylesheet">
  <link href="<?= base_url('assetsforinfo') ?>/css/main.css?ver=1.2.0" rel="stylesheet">
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
</head>

<body id="top">
  <header class="d-print-none">
    <div class="container text-center text-lg-left">
      <div class="py-3 clearfix">
        <h1 class="site-title mb-0"><?php echo $users[0]->nameENG; ?> <?php echo $users[0]->sirNameENG; ?></h1>

      </div>
    </div>
  </header>
  <div class="page-content">
    <div class="container">
      <div class="cover shadow-lg bg-white">
        <div class="cover-bg p-3 p-lg-4 text-white">
          <div class="row">
            <div class="col-lg-4 col-md-5">
              <div class="avatar hover-effect bg-white shadow-sm p-1">
                <!-- <img src="images/avatar.jpg" width="200" height="200"/> -->
                <img width="200" height="200" src="<?= base_url("../avatars/" . $info->ubu_mail . ".png") . '?' . rand() ?>">
              </div>

            </div>
            <div class="col-lg-8 col-md-7 text-center text-md-start">
              <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0"><?php echo $users[0]->forName; ?><?php echo $users[0]->nameTH_em; ?> <?php echo $users[0]->sirNameTH_em; ?></h2>
              <p data-aos="fade-left" data-aos-delay="100"><?php echo $users[0]->forNameENG; ?><?php echo $users[0]->nameENG; ?> <?php echo $users[0]->sirNameENG; ?></p>
              <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
                <a class="btn btn-light text-dark shadow-sm mt-1 me-1" onclick='window.print()' target="_blank">Print this CV</a>
                <!-- <a class="btn btn-success shadow-sm mt-1" href="#contact">Hire Me</a></div> -->
              </div>
            </div>
          </div>
        </div>
        <div class=" pt-4 px-3 px-lg-4 mt-1">
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="row mt-2">
                <table cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="first">Department :</td>
                    <td class="pb-1 text-secondary"><?php echo $users[0]->departmentID_em; ?></td>
                  </tr>
                  <tr>
                    <td class="second">Room :</td>
                    <td class="pb-1 text-secondary"><?php echo $users[0]->roomNumber; ?></td>
                  </tr>
                  <tr>
                    <td class="second">Phone :</td>
                    <td class="pb-1 text-secondary"><?php echo $users[0]->tel; ?></td>
                  </tr>
                  <tr>
                    <td class="second">Mobile :</td>
                    <td class="pb-1 text-secondary"><?php echo $users[0]->mobile; ?></td>
                  </tr>
                  <tr>
                    <td class="second">E-mail :</td>
                    <td class="pb-1 text-secondary"><?php echo $users[0]->email; ?></td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-6 mt-2">
              <!-- <h2 class="h3 mb-3">ประวัติการศึกษา</h2> -->
              <?php if ($users[0]->language == "th") { ?>
                <h5>ประวัติการศึกษา</h5>
                <div class='item'>
                  <?php foreach ($education as $edu) {
                    echo $edu->detail;
                  }
                  ?>
                </div>
              <?php } else if ($users[0]->language == "en") { ?>
                <h5>Education</h5>
                <div class='item'>
                  <?php foreach ($education as $edu) {
                    echo $edu->detail;
                  }
                  ?>
                </div>
              <?php } ?>

            </div>

          </div>
        </div>
        <hr class="d-print-none" />

        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">งานวิจัยที่สนใจ</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Research interest</h2>
          <?php } ?>

          <div class="timeline">
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <!-- <div class="h5 mb-1">Frontend Developer <span class="text-muted h6">at Creative Agency</span></div> -->
                <!-- <div class="text-muted text-small mb-2">May, 2015 - Present</div> -->
                <div>
                  <?php echo $users[0]->description; ?>
                </div>
              </div>
            </div>

          </div>
        </div>

        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">รางวัลและเกียรติยศ</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Award and honour</h2>
          <?php } ?>
          <?php foreach ($award as $awa) { ?>
            <div class="timeline">
              <div class="timeline-card timeline-card-primary card shadow-sm">
                <div class="card-body">
                  <div>
                    <ul>
                      <li><?php echo $awa->detail; ?> </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          <?php } ?>
        </div>



        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">ทุนวิจัย</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Research grant</h2>
          <?php } ?>

          <?php foreach ($scholarship as $sch) { ?>
            <div class="timeline">
              <div class="timeline-card timeline-card-primary card shadow-sm">
                <div class="card-body">
                  <div>
                    <ul>
                      <li><?php echo $sch->detail; ?> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>


        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">ประสบการณ์การทำงาน</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Working experience</h2>
          <?php } ?>

          <?php foreach ($working as $work) { ?>
            <div class="timeline">
              <div class="timeline-card timeline-card-primary card shadow-sm">
                <div class="card-body">
                  <div>
                    <ul>
                      <li><?php echo $work->detail; ?> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">ผลงานตีพิมพ์</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Publication</h2>
          <?php } ?>

          <?php foreach ($publication as $pub) { ?>
          <div class="timeline">
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <div>
                  <ul>
                    <li><?php echo $pub->detail; ?> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">ทักษะอื่นๆ</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Skills</h2>
          <?php } ?>

          <div class="timeline">
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <!-- <div class="h5 mb-1">Frontend Developer <span class="text-muted h6">at Creative Agency</span></div> -->
                <!-- <div class="text-muted text-small mb-2">May, 2015 - Present</div> -->
                <div>
                  <?php foreach ($education as $edu) {
                    echo $edu->detail;
                  }
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <?php if ($users[0]->language == "th") { ?>
            <h2 class="h3 mb-4">การฝึกอบรม</h2>
          <?php } else if ($users[0]->language == "en") { ?>
            <h2 class="h3 mb-4">Trainings</h2>
          <?php } ?>

          <div class="timeline">
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <!-- <div class="h5 mb-1">Frontend Developer <span class="text-muted h6">at Creative Agency</span></div> -->
                <!-- <div class="text-muted text-small mb-2">May, 2015 - Present</div> -->
                <div>
                  <?php foreach ($education as $edu) {
                    echo $edu->detail;
                  }
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
        <hr class="d-print-none" />
        <div class="page-break"></div>

      </div>
    </div>
    <footer class="pt-4 pb-4 text-muted text-center d-print-none">
      <div class="container">

        <div class="text-small">
          <div class="mb-1">&copy; Right Resume. All rights reserved.</div>
          <div>Design - <a href="https://templateflip.com/" target="_blank">TemplateFlip</a></div>
        </div>
      </div>
    </footer>
    <script src="<?= base_url('assetsforinfo') ?>/scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="<?= base_url('assetsforinfo') ?>/scripts/aos.js?ver=1.2.0"></script>
    <script src="<?= base_url('assetsforinfo') ?>/scripts/main.js?ver=1.2.0"></script>
</body>

</html>