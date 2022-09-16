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
                <h4 class="card-title">เลือกข้อมูล CV ที่ต้องการแสดง</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li>**ยังไม่มีข้อมูล</li>
                    <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                  </ul>
                </div>
              </div>


              <div class="ml-6">
                <!--start content -->
                <div class="title_block title_l1 ml-2 " style="margin-top: 20px"> <b>ตอนที่ 1 : ข้อมูลที่กรอกเอง</b></div>
                <br>
                <!-- <form method="POST"  data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""> -->
                <input type="hidden" name="userID" value="<?= $userID ?>" />
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <input class="icheckbox_flat-green " type="checkbox" id="chkSelectAll" checked>
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
                      <?php if ($users[0]->description == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="res" name="cb" value="re" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/dashboard') ?>">งานวิจัยที่สนใจ**</a></label>
                      <?php  } else { ?>
                        <?php if ($users[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="res" name="cb" value="re" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/dashboard') ?>">งานวิจัยที่สนใจ</a></label>
                        <?php } else if ($users[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="res" name="cb" value="re">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/dashboard') ?>">งานวิจัยที่สนใจ</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($award == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="award" name="cb" value="aw" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_award') ?>">รางวัลและเกียรติยศ**</a></label>
                      <?php  } else { ?>
                        <?php if ($award[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="award" name="cb" value="aw" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_award') ?>">รางวัลและเกียรติยศ</a></label>
                        <?php } else if ($award[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="award" name="cb" value="aw">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_award') ?>">รางวัลและเกียรติยศ</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($scholarship == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="scho" name="cb" value="sh" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_scholarship') ?>">ทุนการศึกษา**</a></label>
                      <?php  } else { ?>
                        <?php if ($scholarship[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="scho" name="cb" value="sh" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_scholarship') ?>">ทุนการศึกษา</a></label>
                        <?php } else if ($scholarship[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="scho" name="cb" value="sh">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_scholarship') ?>">ทุนการศึกษา</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($workExp == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="work" name="cb" value="wo" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_work_exps') ?>">ประสบการณ์การทำงาน**</a></label>
                      <?php  } else { ?>
                        <?php if ($workExp[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="work" name="cb" value="wo" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_work_exps') ?>">ประสบการณ์การทำงาน</a></label>
                        <?php } else if ($workExp[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="work" name="cb" value="wo">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_work_exps') ?>">ประสบการณ์การทำงาน</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($publication2 == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="public" name="cb" value="pu" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_publication') ?>">ผลงานตีพิมพ์**</a></label>
                      <?php  } else { ?>
                        <?php if ($publication2[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="public" name="cb" value="pu" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_publication') ?>">ผลงานตีพิมพ์</a></label>
                        <?php } else if ($publication2[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="public" name="cb" value="pu">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_publication') ?>">ผลงานตีพิมพ์</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($skill == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="skill" name="cb" value="sk" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_skill') ?>">ทักษะอื่นๆ**</a></label>
                      <?php  } else { ?>
                        <?php if ($skill[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="skill" name="cb" value="sk" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_skill') ?>">ทักษะอื่นๆ</a></label>
                        <?php } else if ($skill[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="skill" name="cb" value="sk">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_skill') ?>">ทักษะอื่นๆ</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($training == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="train" name="cb" value="tr" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_training') ?>">การฝึกอบรม**</a></label>
                      <?php  } else { ?>
                        <?php if ($training[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="train" name="cb" value="tr" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_training') ?>">การฝึกอบรม</a></label>
                        <?php } else if ($training[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="train" name="cb" value="tr">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/add_training') ?>">การฝึกอบรม</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>

                </div>
                <hr>
                <div class="title_block title_l1 ml-2 " style="margin-top: 20px"> <b>ตอนที่ 2 : ข้อมูลที่ดึงจากระบบ</b></div>
                <br>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($publication == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="pub" name="cb" value="pu" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">ผลงานตีพิมพ์**</a></label>
                      <?php  } else { ?>
                        <?php if ($publication[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="pub" name="cb" value="pu" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">ผลงานตีพิมพ์</a></label>
                        <?php } else if ($publication[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="pub" name="cb" value="pu">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">ผลงานตีพิมพ์</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($research1 == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="ongo" name="cb" value="sk" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">งานวิจัยที่กำลังดำเนินการ**</a></label>
                      <?php  } else { ?>
                        <?php if ($research1[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="ongo" name="cb" value="sk" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">งานวิจัยที่กำลังดำเนินการ</a></label>
                        <?php } else if ($research1[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="ongo" name="cb" value="sk">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">งานวิจัยที่กำลังดำเนินการ</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($research2 == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="com" name="cb" value="tr" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">งานวิจัยที่เสร็จสิ้น**</a></label>
                      <?php  } else { ?>
                        <?php if ($research2[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="com" name="cb" value="tr" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">งานวิจัยที่เสร็จสิ้น</a></label>
                        <?php } else if ($research2[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="com" name="cb" value="tr">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/research') ?>">งานวิจัยที่เสร็จสิ้น</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($document == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="doc" name="cb" value="pu" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/document') ?>">คำสั่ง**</a></label>
                      <?php  } else { ?>
                        <?php if ($document[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="doc" name="cb" value="pu" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/document') ?>">คำสั่ง</a></label>
                        <?php } else if ($document[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="doc" name="cb" value="pu">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/document') ?>">คำสั่ง</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <div class="form-check form-switch">
                      <?php if ($document == NULL) { ?>
                        <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="sk" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/workload') ?>">ภาระงาน**</a></label>
                      <?php  } else { ?>
                        <?php if ($document[0]->status_show == 0) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="sk" checked>
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/workload') ?>">ภาระงาน</a></label>
                        <?php } else if ($document[0]->status_show == 1) { ?>
                          <input class="icheckbox_flat-green dd" type="checkbox" id="toggle" name="cb" value="sk">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><a href="<?= site_url('main/workload') ?>">ภาระงาน</a></label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>

                </div>
                <br>
                <br>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button onclick='vactive();' class="btn btn-success">บันทึก</button>
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

          ////////////งานวิจัยที่สนใจ
          var res;
          if (document.getElementById("res").checked == true) {
            res = 0;
          } else if (document.getElementById("res").checked == false) {
            res = 1;
          }
          $.post('<?= site_url('main/edit_res') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": res,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////รางวัลและเกียรติยศ
          var award;
          if (document.getElementById("award").checked == true) {
            award = 0;
          } else if (document.getElementById("award").checked == false) {
            award = 1;
          }
          $.post('<?= site_url('main/edit_award') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": award,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////ทุนการศึกษา
          var scho;
          if (document.getElementById("scho").checked == true) {
            scho = 0;
          } else if (document.getElementById("scho").checked == false) {
            scho = 1;
          }
          $.post('<?= site_url('main/edit_scho') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": scho,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////ประสบการณ์การทำงาน
          var work;
          if (document.getElementById("work").checked == true) {
            work = 0;
          } else if (document.getElementById("work").checked == false) {
            work = 1;
          }
          $.post('<?= site_url('main/edit_work') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": work,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////ผลงานตีพิมพ์
          var public;
          if (document.getElementById("public").checked == true) {
            public = 0;
          } else if (document.getElementById("public").checked == false) {
            public = 1;
          }
          $.post('<?= site_url('main/edit_public') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": public,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////ทักษะอื่นๆ
          var skill;
          if (document.getElementById("skill").checked == true) {
            skill = 0;
          } else if (document.getElementById("skill").checked == false) {
            skill = 1;
          }
          $.post('<?= site_url('main/edit_skill') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": skill,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////การฝึกอบรม
          var train;
          if (document.getElementById("train").checked == true) {
            train = 0;
          } else if (document.getElementById("train").checked == false) {
            train = 1;
          }
          $.post('<?= site_url('main/edit_train') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": train,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          //////////////ตอนที่2\\\\\\\\\\\\\\\\

          ////////////ผลงานตีพิมพ์
          var pub;
          if (document.getElementById("pub").checked == true) {
            pub = 0;
          } else if (document.getElementById("pub").checked == false) {
            pub = 1;
          }
          $.post('<?= site_url('main/edit_pub') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": pub,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////งานวิจัยที่กำลังดำเนินการ
          var ongo;
          if (document.getElementById("ongo").checked == true) {
            ongo = 0;
          } else if (document.getElementById("ongo").checked == false) {
            ongo = 1;
          }
          $.post('<?= site_url('main/edit_ongo') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": ongo,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////งานวิจัยที่เสร็จสิ้น
          var com;
          if (document.getElementById("com").checked == true) {
            com = 0;
          } else if (document.getElementById("com").checked == false) {
            com = 1;
          }
          $.post('<?= site_url('main/edit_com') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": com,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          ////////////คำสั่ง
          var doc;
          if (document.getElementById("doc").checked == true) {
            doc = 0;
          } else if (document.getElementById("doc").checked == false) {
            doc = 1;
          }
          $.post('<?= site_url('main/edit_doc') ?>', {
            "user_id": <?php echo $userID ?>,
            "status_show": doc,
          }, function(data) {
            if (data.success == true) {}
          }, "json");

          setTimeout(() => {
            window.location = '../../../<?= $info->ubu_mail ?>';
          }, 1000);



        }

        // function vactive() {

        //   var markedCheckbox = document.getElementsByName('cb');
        //   var res = "";
        //   for (var checkbox of markedCheckbox) {
        //     if (checkbox.checked) {
        //       res += checkbox.value + '/';
        //     }
        //   }

        //   window.location = "<?php echo base_url(); ?>index.php/main/cv/" + res;
        // }
      </script>