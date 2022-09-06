<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sci staff CV</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <!-- FontAwesome JS-->
  <script defer src="<?= base_url('DevResume') ?>/assets/fontawesome/js/all.min.js"></script>

  <!-- Theme CSS -->
  <link id="theme-style" rel="stylesheet" href="<?= base_url('DevResume') ?>/assets/css/devresume.css">

</head>

<body>

  <div class="main-wrapper">
    <div class="container px-3 px-lg-5">
      <article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">

        <div class="resume-header">
          <div class="row align-items-center">
            <div class="resume-title col-12 col-md-6 col-lg-8 col-xl-9">
              <h2 class="resume-name mb-0 text-uppercase"><?php echo $users[0]->nameENG; ?> <?php echo $users[0]->sirNameENG; ?></h2>
              <div class="resume-tagline mb-3 mb-md-0"><?php echo $users[0]->forName; ?><?php echo $users[0]->nameTH_em; ?> <?php echo $users[0]->sirNameTH_em; ?></div>
            </div>
            <!--//resume-title-->
            <div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-3">
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><i class="fas fa-globe fa-fw fa-lg me-2"></i>Department :
                  <?php foreach ($deps as $row) {
                    if ($users[0]->departmentID_em == $row->id) { ?>
                      <td class="pb-1 text-secondary"><?php echo $row->nameTH; ?></td>
                  <?php  }
                  } ?>
                </li>
                <li class="mb-2"><i class="fas fa-map-marker-alt fa-fw fa-lg me-2"></i>Room : <?php echo $users[0]->roomNumber; ?></li>
                <li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg me-2"></i>Phone : <?php echo $users[0]->tel; ?></li>
                <li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg me-2"></i>Mobile : <?php echo $users[0]->mobile; ?></li>
                <li class="mb-2"><i class="fas fa-envelope-square fa-fw fa-lg me-2"></i>E-mail : <?php echo $users[0]->email; ?></li>
              </ul>
            </div>
            <!--//resume-contact-->
          </div>
          <!--//row-->

        </div>
        <!--//resume-header-->
        <hr>
        <div class="resume-intro py-3">
          <div class="row align-items-center">
            <div class="col-12 col-md-3 col-xl-2 text-center">
              <img class="resume-profile-image mb-3 mb-md-0 me-md-5  ms-md-0 rounded mx-auto" src="<?= base_url("../avatars/" . $info->ubu_mail . ".png") . '?' . rand() ?>" alt="image">
            </div>

            <div class="col text-start">
              <?php if ($users[0]->language == "th") { ?>
                <h3 class="text-uppercase resume-section-heading mb-4">ประวัติการศึกษา</h3>
                <div class='item'>
                  <?php
                  $no = 0;
                  foreach ($education as $edu) {
                    echo $edu->detail;
                    $no++;
                  }
                  if ($no == 0) {
                    echo "ไม่มีข้อมูล";
                  }
                  ?>
                </div>
              <?php } else if ($users[0]->language == "en") { ?>
                <h3 class="text-uppercase resume-section-heading mb-4">Education</h3>
                <div class='item'>
                  <?php
                  $no = 0;
                  foreach ($education as $edu) {
                    echo $edu->detail;
                    $no++;
                  }
                  if ($no == 0) {
                    echo "ไม่มีข้อมูล";
                  }
                  ?>
                </div>
              <?php } ?>

            </div>
            <!--//col-->
          </div>
        </div>
        <!--//resume-intro-->
        <hr>
        <div class="resume-body">
          <div class="row">
            <div class="resume-main col-12 col-lg-12 col-xl-12   pe-0   pe-lg-5">
              <section class="work-section py-3">
                <?php if ($way1 == "re" || $way2 == "re" || $way3 == "re" || $way4 == "re" || $way5 == "re" || $way6 == "re" || $way7 == "re") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">งานวิจัยที่สนใจ</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Research interest</h3>
                  <?php } ?>
                  <div class="item-content">
                    <?php if ($users[0]->description == NULL) {
                      echo "ไม่มีข้อมูล";
                    } else {
                      echo $users[0]->description;
                    } ?>
                  </div>

                <?php } ?>
              </section>
              <!--//work-section-->
              <section class="work-section py-3">
                <?php if ($way1 == "aw" || $way2 == "aw" || $way3 == "aw" || $way4 == "aw" || $way5 == "aw" || $way6 == "aw" || $way7 == "aw") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">รางวัลและเกียรติยศ</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Award and honour</h3>
                  <?php } ?>
                  <?php
                  $no = 0;
                  foreach ($award as $awa) { ?>
                    <div class="item-content">
                      <ul>
                        <li><?php echo $awa->detail; ?> </li>
                      </ul>
                    </div>
                  <?php
                    $no++;
                  }
                  if ($no == 0) { ?>
                    <div class="item-content">
                      <ul>
                        <li>ไม่มีข้อมูล</li>
                      </ul>
                    </div>
                  <?php } ?>
                <?php } ?>
              </section>


              <section class="work-section py-3">
                <?php if ($way1 == "sh" || $way2 == "sh" || $way3 == "sh" || $way4 == "sh" || $way5 == "sh" || $way6 == "sh" || $way7 == "sh") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">ทุนวิจัย</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Research grant</h3>
                  <?php } ?>
                  <div class="item-content">
                  <?php
                  $no = 0;
                  foreach ($scholarship as $sch) { ?>
                    <ul>
                      <li><?php echo $sch->detail; ?> </li>
                    </ul>
                  <?php
                    $no++;
                  }
                  if ($no == 0) { ?>
                    <ul>
                      <li>ไม่มีข้อมูล</li>
                    </ul>
                  <?php } ?>
                  </div>
                <?php } ?>
              </section>

              <section class="work-section py-3">
                <?php if ($way1 == "wo" || $way2 == "wo" || $way3 == "wo" || $way4 == "wo" || $way5 == "wo" || $way6 == "wo" || $way7 == "wo") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">ประสบการณ์การทำงาน</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Working experience</h3>
                  <?php } ?>
                  <div class="item-content">
                  <?php
                  $no = 0;
                  foreach ($working as $work) { ?>
                    <div>
                      <ul>
                        <li><?php echo $work->detail; ?> </li>
                      </ul>
                    </div>
                  <?php
                    $no++;
                  }
                  if ($no == 0) { ?>
                    <div>
                      <ul>
                        <li>ไม่มีข้อมูล</li>
                      </ul>
                    </div>
                  <?php } ?>
                  </div>
                <?php } ?>
              </section>


              <section class="work-section py-3">
                <?php if ($way1 == "pu" || $way2 == "pu" || $way3 == "pu" || $way4 == "pu" || $way5 == "pu" || $way6 == "pu" || $way7 == "pu") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">ผลงานตีพิมพ์</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Publication</h3>
                  <?php } ?>
                  <div class="item-content">
                  <?php
                  $no = 0;
                  foreach ($publication as $pub) { ?>
                    <div>
                      <ul>
                        <li><?php echo $pub->detail; ?> </li>
                      </ul>
                    </div>
                  <?php
                    $no++;
                  }
                  if ($no == 0) { ?>
                    <div>
                      <ul>
                        <li>ไม่มีข้อมูล</li>
                      </ul>
                    </div>
                  <?php } ?>
                  </div>
                <?php } ?>
              </section>


              <section class="work-section py-3">
                <?php if ($way1 == "sk" || $way2 == "sk" || $way3 == "sk" || $way4 == "sk" || $way5 == "sk" || $way6 == "sk" || $way7 == "sk") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">ทักษะอื่นๆ</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Skills</h3>
                  <?php } ?>
                  <div class="item-content">
                  <?php
                  $no = 0;
                  foreach ($skill as $ski) { ?>
                    <div>
                      <ul>
                        <li><?php echo $ski->detail; ?> </li>
                      </ul>
                    </div>
                  <?php
                    $no++;
                  }
                  if ($no == 0) { ?>
                    <div>
                      <ul>
                        <li>ไม่มีข้อมูล</li>
                      </ul>
                    </div>
                  <?php } ?>
                  </div>
                <?php } ?>
              </section>


              <section class="work-section py-3">
                <?php if ($way1 == "tr" || $way2 == "tr" || $way3 == "tr" || $way4 == "tr" || $way5 == "tr" || $way6 == "tr" || $way7 == "tr") { ?>
                  <?php if ($users[0]->language == "th") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">การฝึกอบรม</h3>
                  <?php } else if ($users[0]->language == "en") { ?>
                    <h3 class="text-uppercase resume-section-heading mb-4">Trainings</h3>
                  <?php } ?>
                  <div class="item-content">
                  <?php
                  $no = 0;
                  foreach ($training as $tra) { ?>
                    <div>
                      <ul>
                        <li><?php echo $tra->detail; ?> </li>
                      </ul>
                    </div>
                  <?php
                    $no++;
                  }
                  if ($no == 0) { ?>
                    <div>
                      <ul>
                        <li>ไม่มีข้อมูล</li>
                      </ul>
                    </div>
                  <?php } ?>
                  </div>
                <?php } ?>
              </section>

              <!--//project-section-->
            </div>
            <!--//resume-main-->

          </div>
          <!--//row-->
        </div>
        <!--//resume-body-->
        <hr class="d-print-none">
        <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
          <a class="btn btn-light text-dark shadow-sm mt-1 me-1" onclick='window.print()' target="_blank">Print this CV</a>
        </div>
        <!--//resume-footer-->
      </article>

    </div>
    <!--//container-->


  </div>
  <!--//main-wrapper-->


</body>

</html>

<style>
  @page: first {
    margin-left: 0.75cm;
    margin-top: 0.25cm;
    margin-bottom: 0.25cm;
    margin-right: 0.75cm;
  }
</style>