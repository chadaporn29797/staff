<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">เลือกข้อมูล CV</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">เลือกข้อมูล CV
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Line Awesome section start -->
      <section id="line-awesome-icons">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">เลือกข้อมูล CV ที่ต้องการพิมพ์</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                  </ul>
                </div>
              </div>


              <div class="ml-6">
                <!--start content -->
                <br>
                <!-- <form method="POST"  data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""> -->
                  <input type="hidden" name="userID" value="<?= $userID ?>" />
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green " type="checkbox" id="chkSelectAll">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/dashboard') ?>">ทั้งหมด</a></label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green" type="checkbox" id="toggle" checked disabled name="cb" value="ed">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_education') ?>">ประวัติการศึกษา</a></label>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle"  name="cb" value="re">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/dashboard') ?>">งานวิจัยที่สนใจ</a></label>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="aw">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_award') ?>">รางวัลและเกียรติยศ</a></label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="sh">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_scholarship') ?>">ทุนการศึกษา</a></label>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="wo">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_work_exps') ?>">ประสบการณ์การทำงาน</a></label>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="pu">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_publication') ?>">ผลงานตีพิมพ์</a></label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="sk">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_skill') ?>">ทักษะอื่นๆ</a></label>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="tr">
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_training') ?>">การฝึกอบรม</a></label>
                      </div>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button onclick='vactive();' class="btn btn-success">ดูตัวอย่าง</button>
                      <a href='<?= site_url("main/dashboard") ?>' class="btn btn-primary" type="button">ยกเลิก</a>
                    </div>
                  </div>

                <!-- </form> -->
                <!--- end content -->

              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- // Line Awesome section end -->

      <script>
        $("#chkSelectAll").on('click', function() {
          this.checked ? $(".dd").prop("checked", true) : $(".dd").prop("checked", false);
        })

        function vactive() {

          var markedCheckbox = document.getElementsByName('cb');
          var res = "";
          for (var checkbox of markedCheckbox) {
            if (checkbox.checked) {
              res += checkbox.value + '/';
            }
          }
        
          window.location = "<?php echo base_url(); ?>index.php/main/cv/"+ res;
        }
      </script>