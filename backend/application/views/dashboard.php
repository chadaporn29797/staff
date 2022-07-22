<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">หน้าหลัก</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">หน้าหลัก
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Line Awesome section start -->
      <section id="header-footer">
        <div class="row match-height">
          <div class="col-lg-4 col-md-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">ข้อมูลพื้นฐาน</h4>
                <h6 class="card-subtitle text-muted"><a href='../../../<?= $info->ubu_mail ?>' target='_blank'>View your CV &nbsp;<i class="la la-external-link" aria-hidden="true"></i></a></h6>
              </div>
              <div class="profile_img w3-center ">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <a href='<?= site_url('main/edit_picture') ?>'><img style=" display: inline-block;width: 150px;height: 150px;border-radius: 50%;background-repeat: no-repeat;background-position: center center;background-size: cover;" class="img-responsive avatar-view" src="<?= base_url("../avatars/" . $info->ubu_mail . ".png") . '?' . rand() ?>" alt="Avatar" title="Change the avatar"></a>
                </div>
              </div>
              <div class="card-body">
              <h4><?= $info->fullName ?></h4>
              <h4><?= $info->fullNameENG ?></h4>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i>ห้องพัก <?= $info->roomNumber ?>
                </li>
                <li> เบอร์โทรภายใน <?= $info->tel ?></li>
                <li> โทรศัพท์มือถือ <?= $info->mobile ?></li>

                <li>
                  <i class="fa fa-envelope"></i> <?= $info->email ?>
                </li>
                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i>สังกัด <?= $info->departmentName ?>
                </li>
              </ul>

              <a class="btn btn-success" href="<?= site_url('main/edit_profile') ?>"> <i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
              <br>
              </p>
              </div>
              <!-- <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-left">แก้ไขเมื่อ 3 hours ago</span>
                <span class="float-right">
                  <a href="<?= site_url('main/edit_profile') ?>" class="card-link">edit
                    <i class="la la-angle-right"></i>
                  </a>
                </span>
              </div> -->
            </div>
          </div>

          <div class="col-lg-8 col-md-12">
            <div class="card">
              
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>
                    <a href="#addEducationModal" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <span id="education" class='dashboard-title'>Educational Background</span>
                </div>
                </h4>
                <div class="panel-body">

                  <?php foreach ($educations as $education) : ?>
                    <div class="row">
                      <div class="col-md-2">
                        <a href='#editEducationModal' data-toggle='modal' data-id='<?= $education->id ?>'><i class="fa fa-pencil"></i></a>
                        <a href='#' class="delete-education" data-id='<?= $education->id ?>'><i class="fa fa-remove"></i></a>
                        <a href='#' class="sort-education" data-direction="up" data-sort-order="<?= $education->sortOrder ?>" data-id='<?= $education->id ?>'><i class="fa fa-angle-double-up"></i></a>
                        <a href='#' class="sort-education" data-direction="down" data-sort-order="<?= $education->sortOrder ?>" data-id='<?= $education->id ?>'><i class="fa fa-angle-double-down"></i></a>
                      </div>

                      <div class="col-md-10"><?= $education->detail ?></div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- // Line Awesome section end -->