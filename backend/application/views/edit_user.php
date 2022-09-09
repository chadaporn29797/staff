<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">แก้ไขผู้ใช้งาน</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">แก้ไขผู้ใช้งาน
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
                <h4 class="card-title">ข้อมูลเบื้องต้น</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                  <li class="mr-1" >อัพเดตข้อมูลล่าสุดเมื่อ <?php echo $users[0]->update; ?> </li>
                    <button class="btn btn-info mr-1" data-toggle="modal" id="update" title="ดึงข้อมูลจากระบบ" data-target="#add-new-group">อัพเดตข้อมูล</button>

                    <li><a href='<?= site_url('main/edit_userAll/' . $users[0]->userID) ?>'>
                        แก้ไขข้อมูลทั้งหมด
                      </a></li>
                    <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->

                  </ul>
                </div>
              </div>

              <div class="ml-6">
                <!--start content -->
                <br>
                <form method="POST" action='<?php echo base_url(); ?>index.php/main/edit_user2/<?php echo $users[0]->userID; ?>' enctype='multipart/form-data' class="form-horizontal form-label-left">
                  <input type="hidden" name="userID" value="<?= $userID ?>" />
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label class="control-label ml-1" for="forName">คำนำหน้าภาษาไทย
                      </label>
                      <div class="ml-1">
                        <input type="text" id="forName" name="forName" required="required" class="form-control " value="<?php echo $users[0]->forName; ?>">
                      </div>
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label ml-1" for="nameTH_em">ชื่อภาษาไทย<span class="required">*</span>
                      </label>
                      <div class="  ">
                        <input type="text" id="nameTH_em" name="nameTH_em" value='<?php echo $users[0]->nameTH_em; ?>' required class="form-control ">
                      </div>
                    </div>

                    <div class="form-group col-md-5 ">
                      <label class="control-label " for="sirNameTH_em">นามสกุล <span class="required">*</span>
                      </label>
                      <div class=" mr-1 ">
                        <input type="text" id="sirNameTH_em" name="sirNameTH_em" value='<?php echo $users[0]->sirNameTH_em; ?>' required class="form-control ">
                        <input type="hidden" id="username" name="username" value='<?php echo $users[0]->username; ?>'>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label class="control-label ml-1  " for="forNameENG">คำนำหน้า(ENG)
                      </label>
                      <div class=" ml-1 ">
                        <input type="text" id="forNameENG" name="forNameENG" required="required" class="form-control " value='<?php echo $users[0]->forNameENG; ?>'>
                      </div>
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label " for="nameENG">ชื่อ(ENG)
                      </label>
                      <div class="  ">
                        <input type="text" id="nameENG" name="nameENG" class="form-control " value='<?php echo $users[0]->nameENG; ?>'>
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label " for="sirNameENG">นามสกุล(ENG)
                      </label>
                      <div class=" mr-1 ">
                        <input type="text" id="sirNameENG" name="sirNameENG" class="form-control " value='<?php echo $users[0]->sirNameENG; ?>'>
                      </div>
                    </div>
                  </div>


                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label class="control-label ml-1">Username</label>
                      <div class="ml-1">
                        <input id="username" name="username" value='<?php echo $users[0]->username; ?>' class=" form-control " required="required" type="text">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label ">หน่วยงาน</label>
                      <div class="">
                        <fieldset class="form-group">

                          <select class="form-control" id="departmentID_em" name="departmentID_em">
                            <?php
                            $ii = $users[0]->departmentID_em;
                            foreach ($deps as $dep) {
                              if ($dep->id == $ii) {
                                $selected = 'selected';
                              } else {
                                $selected = '';
                              }
                            ?>
                              <option value="<?php echo $dep->id; ?>" <?php echo $selected; ?>><?php echo $dep->nameTH; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </fieldset>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label class="control-label ml-1">หน้าที่</label>
                      <div class="ml-1">
                        <fieldset class="form-group">
                          <select class="form-control" id="role" name="role">
                            <?php
                            $role = $users[0]->role;
                            if ($role == 2) { ?>
                              <option value="2" selected>เจ้าหน้าที่</option>
                              <option value="1">แอดมิน</option>
                            <?php } else if ($role == 1) { ?>
                              <option value="2">เจ้าหน้าที่</option>
                              <option value="1" selected>แอดมิน</option>
                            <?php } ?>
                          </select>
                        </fieldset>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <label class="control-label " for="first-name">email<span class="required"> </span></label>
                      <div class="">
                        <input id="email" name="email" class=" form-control " value='<?php echo $users[0]->email; ?>' required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label " for="first-name">UBU-email<span class="required"> </span></label>
                      <div class="mr-1">
                        <input id="ubu_mail" name="ubu_mail" class=" form-control " value='<?php echo $users[0]->ubu_mail; ?>' placeholder="ไม่ต้องใส่ @" required="required" type="text">
                      </div>
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">บันทึก</button>
                      <button onclick="history.back()" type="button" class="btn btn-primary">ยกเลิก</button>
                    </div>
                  </div>

                </form>
                <!--- end content -->

              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- // Line Awesome section end -->

      <script>
        $("#update").click(function(e) {
          e.preventDefault();
          var url = "http://dataservice.sci.ubu.ac.th/1.2/index.php/StaffInfo/getPerson/" + $("#username").val();
          

          $.get(url, function(data) {
            console.log(data);
            $.each(data, function(i, item) {
              $.post('<?= site_url('main/update_userID/') ?>', {
                "nameEng": data[i].nameEng,
                "nameTH": data[i].nameTH,
                "positionNameTH": data[i].positionNameTH,
                "prefixNameEng": data[i].prefixNameEng,
                "prefixNameTH": data[i].prefixNameTH,
                "sirNameEng": data[i].sirNameEng,
                "sirNameTH": data[i].sirNameTH,
                "username": $("#username").val(),
              }, function(data) {
                if (data.success == true) {}
              }, "json");

            });
            alert("อัพเดตข้อมูลเรียบร้อย");
            // setTimeout(() => {
            //   document.location.reload();
            // }, 1000);

          }, "json");


        });
      </script>